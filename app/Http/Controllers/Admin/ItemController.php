<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
class ItemController extends Controller
{
    use AuthenticatesUsers;
    public function index()
    {
        $items = Item::all();
        return view('admin.items.items', compact('items'));
    }
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'modal-input-title' => ['required', 'string', 'max:255'],
            'modal-input-pic' => ['required','image'],
            'modal-input-price' => ['required', 'integer','min:0'],
            'modal-input-totle' => ['required', 'integer','min:0']
        ], [
            'modal-input-title.required' => '名稱不能为空',
            'modal-input-title.string' => '名稱必須為字串',
            'modal-input-title.max' => '名稱長度必須小於255',
            'modal-input-pic.required' => '上傳不能为空',
            'modal-input-pic.image' => '上傳必須為圖片',
            'modal-input-price.required' => '價錢不能为空',
            'modal-input-price.integer' => '價錢必須為數字',
            'modal-input-price.min' => '價錢最小為0',
            'modal-input-totle.required' => '數量不能为空',
            'modal-input-totle.integer' => '數量必須為數字',
            'modal-input-totle.min' => '數量最小為0'
         ])->validate();
        if($request->hasFile('modal-input-pic')){
            $image=$request->file('modal-input-pic');
            $extension = $image->getClientOriginalExtension(); //副檔名
            $filename =  time() . "." . $extension;    //重新命名
            $uploadPic = Storage::put('public/' . $filename,file_get_contents($image->getRealPath()));
            $photoURL = Storage::url('public/' . $filename);
            //$path = $image->store('public');;
        }
        Item::create([
            'title' => $request->input('modal-input-title'),
            'pic' => $filename,
            'price' => $request->input('modal-input-price'),
            'totle' => $request->input('modal-input-totle'),
        ]);
        return redirect()->route('items.index');
    }
    public function create()
    {
    }
    public function show()
    {
    }
    public function update(Request $request)
    {
        
        // $this->validate($request, [
        //     'modal-edit-title' => 'required|string|max:255',
        //     'modal-edit-pic' => 'required|image',
        //     'modal-edit-price' => 'required|integer',
        //     'modal-edit-totle' => 'required|integer',
        // ]);
        Validator::make($request->all(), [
            'modal-edit-title' => ['required', 'string', 'max:255'],
            'modal-edit-pic' => ['image'],
            'modal-edit-price' => ['required', 'integer','min:0'],
            'modal-edit-totle' => ['required', 'integer','min:0']
        ], [
            'modal-edit-title.required' => '名稱不能为空',
            'modal-edit-title.string' => '名稱必須為字串',
            'modal-edit-title.max' => '名稱長度必須小於255',
            'modal-edit-pic.image' => '上傳必須為圖片',
            'modal-edit-price.required' => '價錢不能为空',
            'modal-edit-price.integer' => '價錢必須為數字',
            'modal-edit-price.min' => '價錢最小為0',
            'modal-edit-totle.required' => '數量不能为空',
            'modal-edit-totle.integer' => '數量必須為數字',
            'modal-edit-totle.min' => '數量最小為0'
         ])->validate();
        // Validator::make($request->all(), [
        //     'modal-edit-title' => 'required|string|max:255',
        //     'modal-edit-pic' => 'required|image',
        //     'modal-edit-price' => 'required|integer',
        //     'modal-edit-totle' => 'required|integer',

        // ])->validate();
        
        

        $user = Item::find($request->input('modal-edit-id'));
        $user->title = $request->input('modal-edit-title');
        $user->price = $request->input('modal-edit-price');
        $user->totle = $request->input('modal-edit-totle');
        if($request->hasFile('modal-edit-pic')){
            $image=$request->file('modal-edit-pic');
            $extension = $image->getClientOriginalExtension(); //副檔名
            $filename =  time() . "." . $extension;    //重新命名
            $uploadPic = Storage::put('public/' . $filename,file_get_contents($image->getRealPath()));
            $photoURL = Storage::url('public/' . $filename);
            // $path = $image->store('public');;
        }
        $user->save();
        return redirect()->route('items.index');
    }
    public function destroy($id)
    {
        Item::find($id)->delete();
        //return redirect()->route('users.index');
    }
    public function edit()
    {
    }
}
