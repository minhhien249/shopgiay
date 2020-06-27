<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Blog;
use App\Category;
use App\Product;
use App\User;
use App\Setting;
use Illuminate\Http\Request;
use DB;

class GeneralController extends Controller
{
    protected $categories;

    public function __construct()
    {
        // 1. Lấy dữ liệu - Danh mục sản phẩm
        $categories = Category::where('is_active' ,1)
                                ->get();
        $this->categories = $categories;



        // 2. Lấy dữ liệu - Banner
        $banners = Banner::where('is_active' , 1)->get();

        //3 lấy dữ liệu blog
        $newblogs = Blog::where('is_active' , 1)
                                ->limit(4)
                                ->orderBy('id', 'desc')
                                ->get();

        $products = Product::where('is_active' , 1)
                            ->limit(10)->orderBy('id', 'desc')
                            ->get();

        $hotProducts = Product::where('is_active' , 1)
                            ->where('is_hot', 1)
                            ->limit(10)
                            ->get();
        // 4. cấu hình website
        $settings = Setting::first();

        view()->share(['categories'=>$categories,'banners' =>$banners,'newblogs'=>$newblogs,
            'products'=> $products, 'hotProducts' => $hotProducts,'settings' => $settings ]);
    }
    public function notfound()
    {
        return view('shop.notfound');
    }

    //
    public function search(Request $request)
    {
        $keyword = $request->input('tu-khoa');
        $slug = str_slug($keyword);
        $totalResult = 0;

        $products = [];

        $products = Product::where([
            ['name', 'like', '%' . $keyword . '%'],
            ['is_active', '=', 1]
        ])->orWhere([
            ['slug', 'like', '%' . str_slug($keyword) . '%'],
            ['is_active', '=', 1]
        ])->orWhere([
            ['summary', 'like', '%' . $keyword . '%'],
            ['is_active', '=', 1]
        ])->paginate(20);

        $totalResult = $products->total();

        // return view('shop.search', [
        //     'products' => $products,
        //     'totalResult' => $totalResult,
        //     'keyword' => $keyword]);
        return view('shop.search', compact('products','keyword','totalResult'));

    }
}
