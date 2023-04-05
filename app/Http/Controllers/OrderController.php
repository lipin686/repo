<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Item;
use App\Cart;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use \ECPay_PaymentMethod as ECPayMethod;
use \ECPay_AllInOne as ECPay;

class OrderController extends Controller
{
    public function index()
    {
        if (Auth::guest()) {
            return redirect()->route('login');
        } else {
            $orders = Order::where('user_id', Auth::id())->get();
            return view('orders', compact('orders'));
        }
    }
    public function new()
    {
        $oldCart = session()->has('cart') ? session()->get('cart') : null;
        $cart = new Cart($oldCart);
        return view('order', [
            'items' => $cart->items,
            'totalPrice' => $cart->totalPrice,
            'totalQty' => $cart->totalQty
        ]);
    }
    public function store()
    {
        request()->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        $cart = session()->get('cart');
        $uuid_temp = str_replace("-", "", substr(Str::uuid()->toString(), 0, 18));
        $order = Order::create([
            'user_id' => Auth::id(),
            'name' => request('name'),
            'phone' => request('phone'),
            'address' => request('address'),
            'cart' => serialize($cart),
            'comment' => "",
            'uuid' => $uuid_temp,
        ]);
        $cart = new Cart(Session::get('cart'));
        #print_r($cart->items);
        // exit;
        // foreach ($cart as $a => $arr) {
        //     echo $a;
            // print_r($arr);
            // exit;
        foreach ($cart->items as $id =>$value) {
            $qty = $cart->getQty($id);
            $item = Item::findOrFail($id);
            $item->totle=$item->totle-$qty;
            $item->save();
        }
        // }
// exit;
        try {

            $obj = new ECPay();

            //服務參數
            $obj->ServiceURL  = "https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5";   //服務位置
            $obj->HashKey     = '5294y06JbISpM5x9';                                           //測試用Hashkey，請自行帶入ECPay提供的HashKey
            $obj->HashIV      = 'v77hoKGq4kWxNNIS';                                           //測試用HashIV，請自行帶入ECPay提供的HashIV
            $obj->MerchantID  = '2000132';                                                     //測試用MerchantID，請自行帶入ECPay提供的MerchantID
            $obj->EncryptType = '1';                                                           //CheckMacValue加密類型，請固定填入1，使用SHA256加密


            //基本參數(請依系統規劃自行調整)
            $MerchantTradeNo = $uuid_temp;
            $obj->Send['ReturnURL']         = "https://shoppingcart.com/callback";    //付款完成通知回傳的網址
            $obj->Send['PeriodReturnURL']   = "https://shoppingcart.com/callback";    //付款完成通知回傳的網址
            $obj->Send['ClientBackURL']     = "https://shoppingcart.com/success";    //付款完成通知回傳的網址
            $obj->Send['MerchantTradeNo']   = $MerchantTradeNo;                          //訂單編號
            $obj->Send['MerchantTradeDate'] = date('Y/m/d H:i:s');                       //交易時間
            $obj->Send['TotalAmount']       = $cart->totalPrice;                                      //交易金額
            $obj->Send['TradeDesc']         = "good to drink";                          //交易描述
            $obj->Send['ChoosePayment']     = ECPayMethod::Credit;              //付款方式:Credit
            $obj->Send['IgnorePayment']     = ECPayMethod::GooglePay;           //不使用付款方式:GooglePay

            //訂單的商品資料
            array_push($obj->Send['Items'], array(
                'Name' => request('name'), 'Price' => $cart->totalPrice,
                'Currency' => "元", 'Quantity' => (int) "1", 'URL' => "dedwed"
            ));


            //Credit信用卡分期付款延伸參數(可依系統需求選擇是否代入)
            //以下參數不可以跟信用卡定期定額參數一起設定
            $obj->SendExtend['CreditInstallment'] = '';    //分期期數，預設0(不分期)，信用卡分期可用參數為:3,6,12,18,24

            $obj->SendExtend['Redeem'] = false;           //是否使用紅利折抵，預設false
            $obj->SendExtend['UnionPay'] = false;          //是否為聯營卡，預設false;

            //Credit信用卡定期定額付款延伸參數(可依系統需求選擇是否代入)
            //以下參數不可以跟信用卡分期付款參數一起設定
            // $obj->SendExtend['PeriodAmount'] = '' ;    //每次授權金額，預設空字串
            // $obj->SendExtend['PeriodType']   = '' ;    //週期種類，預設空字串
            // $obj->SendExtend['Frequency']    = '' ;    //執行頻率，預設空字串
            // $obj->SendExtend['ExecTimes']    = '' ;    //執行次數，預設空字串

            # 電子發票參數
            /*
        $obj->Send['InvoiceMark'] = ECPay_InvoiceState::Yes;
        $obj->SendExtend['RelateNumber'] = "Test".time();
        $obj->SendExtend['CustomerEmail'] = 'test@ecpay.com.tw';
        $obj->SendExtend['CustomerPhone'] = '0911222333';
        $obj->SendExtend['TaxType'] = ECPay_TaxType::Dutiable;
        $obj->SendExtend['CustomerAddr'] = '台北市南港區三重路19-2號5樓D棟';
        $obj->SendExtend['InvoiceItems'] = array();
        // 將商品加入電子發票商品列表陣列
        foreach ($obj->Send['Items'] as $info)
        {
            array_push($obj->SendExtend['InvoiceItems'],array('Name' => $info['Name'],'Count' =>
                $info['Quantity'],'Word' => '個','Price' => $info['Price'],'TaxType' => ECPay_TaxType::Dutiable));
        }
        $obj->SendExtend['InvoiceRemark'] = '測試發票備註';
        $obj->SendExtend['DelayDay'] = '0';
        $obj->SendExtend['InvType'] = ECPay_InvType::General;
        */


            //產生訂單(auto submit至ECPay)
            $obj->CheckOut();
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        session()->forget('cart');

        //return redirect()->action('OrderController@index');
    }
    public function callback(Request $request)
    {
        $order = Order::where('uuid', '=', $request->MerchantTradeNo)->firstOrFail();
        $order->paid = !$order->paid;
        $order->save();
    }

    public function redirectFromECpay()
    {
        session()->flash('success', 'Order success!');
        return redirect('/');
    }
}
