<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\Blog;
use App\Product;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function index()
    {
        $numOrder = Order::count();
        $numBlog = Blog::count();
        $numProduct = Product::count();
        $numUser = User::count();

        return view('admin.dashboard', [
            'numOrder' => $numOrder,
            'numBlog' => $numBlog,
            'numProduct' => $numProduct,
            'numUser' => $numUser
        ]);
    }
    public function login()
    {
        return view('admin.login');
    }
    public function postLogin(Request $request)
    {
        //validate du lieu
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6'
        ]);

        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
        // check success
        if (Auth::attempt($data, $request->has('remember'))) {
            return redirect()->route('admin.dashboard');
        }else
        {
            return redirect()->back()->with('msg', 'Email hoặc Password không chính xác');
        }

    }
     public function logout()
    {
        Auth::logout();
        // chuyển về trang đăng nhập
        return redirect()->route('admin.login');
    }
}
