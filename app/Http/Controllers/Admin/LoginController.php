<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout'); //Kernal內有定義guest別名的實際路徑
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }

    // protected function authenticated(Request $request, $user)  登入後的轉址 跟上面redirectTo一樣
    // { 
    //     return redirect(route('home')); 
    // }
    protected function guard()
    {
        return Auth::guard('admin');
    }
    public function username()
    {
        return 'name';
    }
    // 退出后跳转页面
    protected function loggedOut(Request $request)
    {
        return redirect(route('admin.login'));
    }
}