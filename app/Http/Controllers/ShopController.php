<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Cart;
use App\Category;
use App\Product;
use App\ImageUpLoad;
use App\Brand;
use App\Blog;
use App\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;
use Illuminate\Support\Str;

class ShopController extends GeneralController
{

    public function __construct()
    {
        parent::__construct();

    }
    // trang chủ
    public function index()
    {

        $categories = $this->categories;

        //  Lấy danh sách phẩm theo thể loại
        $list = []; // chứa danh sách sản phẩm  theo thể loại
        foreach($categories as $key => $category) {
            if($category->parent_id == 0) { // check danh mục cha
                $ids = [$category->id]; // $ids = array($category->id);

                foreach($categories as $child) {
                    if ($child->parent_id == $category->id) {
                        $ids[] = $child->id; // thêm phần tử vào mảng
                    }
                } // ids = [1,7,8,9,..]

                $list[$key]['category'] = $category;

                $list[$key]['products'] = Product::where(['is_active' => 1, 'is_hot' => 1])
                                                        ->whereIn('category_id' , $ids)
                                                        ->limit(10)->orderBy('id', 'desc')
                                                        ->get();
            }
        }

        return view('shop.home',[
            'list' => $list
        ]);
    }

    public function newArrival()
    {


        return view('shop.home',[
            'product' => $products
        ]);
    }

    public function getProduct( $slug , $id)
    {
    // get chi tiet sp
    $product = Product::find($id);
    if (!$product) {
     return $this->notfound();
    }

    $category = Category::find($product->category_id);

    $tags = Category::where([
                         ['id' , '<>', 0],
                         ['is_active' , '=', 1]
                     ])->get();

        $product_img = Product::where('id',$id)->first();

        $image = ImageUpLoad::select('id','filename')->where('product_id',$product_img->id)->get();

        // step 2 : lấy list SP liên quan
        $relatedProducts = Product::where([
                                ['is_active' , '=', 1],
                                ['category_id', '=' , $category->id ],
                                ['id', '<>' , $id]
                            ])->orderBy('id', 'desc')->paginate(10);

        return view('shop.product',[
            'category' => $category,
            'product' => $product,
            'relatedProducts' => $relatedProducts,
            'image' => $image
        ]);
    }
        // Get san phan theo the loai
        public function getProductsByCategory($slug)
        {

            $i=0;
            // Lấy chi tiết thể loại
            $cate = Category::where(['slug' => $slug])->first();

            if ($cate) {
                $categories = $this->categories;
                // step 1.1 Check danh mục cha -> lấy toàn bộ danh mục con để where In
                $ids = [];
                foreach($categories as $key => $category) {
                    if($category->id == $cate->id) {
                        $ids[] = $cate->id;
                        foreach ($categories as $child) {
                            if ($child->parent_id == $cate->id) {
                                $ids[] = $child->id; // thêm phần tử vào mảng

                            }

                        }
                    }

                }
                // step 2 : lấy list sản phẩm theo thể loại

                $products = Product::where(['is_active' => 1])
                                        ->whereIn('category_id' , $ids)
                                        ->orderBy('id', 'desc')
                                        ->get();
                $brandsFilter = DB::table('products')
                                ->select('brand_id','brands.name')
                                ->distinct()
                                ->join('brands', 'brands.id', '=', 'products.brand_id')
                                ->whereIn('category_id' , $ids)
                                ->get();


                //$sql = "SELECT * FROM products WHERE is_active = 1 AND (name like '%?%' OR slug like '%?%' OR summary like '%?%')";
                //$results = DB::select($sql, [
                //    $keyword, $slug , $keyword
                //]);

                return view('shop.products-by-category',[
                    'category' => $category,
                    'products' => $products,
                    'brandsFilter' => $brandsFilter,
                    'i'        => $i,
                    'cate'     => $cate
                ]);
            } else {
                return $this->notfound();
            }
        }



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
            return view('shop.search', [
                'products' => $products,
                'totalResult' => $totalResult,
                'keyword' => $keyword ? $keyword : ''
            ]);
        }
        public function filter(Request $request, $slug)
        {

            $brand_id=[];
            $i=0;
            $priceCount = $request->input('price');
            // Lấy chi tiết thể loại
            $cate = Category::where(['slug' => $slug])->first();
            if ($cate) {
                $categories = $this->categories;
                // step 1.1 Check danh mục cha -> lấy toàn bộ danh mục con để where In
                $ids = [];
                foreach($categories as $key => $category) {
                    if($category->id == $cate->id) {
                        $ids[] = $cate->id;
                        foreach ($categories as $child) {
                            if ($child->parent_id == $cate->id) {
                                $ids[] = $child->id; // thêm phần tử vào mảng
                                 // thêm phần tử vào mảng

                            }
                        }
                    }
                }

                    if($request->input('brand_id') !== null && $request->input('price') !== null)
                    {
                    $brand_id = explode(",",$request->input('brand_id'));
                    $price = explode("-",$request->input('price'));

                    $start = $price[0]; // Lấy giá phía bên trái
                    $end = $price[1]; // Lấy giá phía bên phải
                    // step 2 : lấy list sản phẩm theo thể loại
                    $products = Product::where(['is_active' => 1])
                                        ->whereIn('category_id' , $ids)
                                        ->whereIn('brand_id', $brand_id)
                                        ->where('price', ">=", $start)
                                        ->where('price', "<=", $end)
                                         ->get();
                    }
                    else if($priceCount !== null && $request->input('brand_id') == null )
                    {
                    $brand_id = explode(",",$request->input('brand_id'));
                    $price = explode("-",$request->input('price'));
                    $start = $price[0]; // Lấy giá phía bên trái
                    $end = $price[1]; // Lấy giá phía bên phải
                // step 2 : lấy list sản phẩm theo thể loại
                    $products = Product::where(['is_active' => 1])
                                        ->whereIn('category_id' , $ids)
                                        ->where('price', ">=", $start)
                                        ->where('price', "<=", $end)
                                        ->get();

                    }
                    else if ($request->input('brand_id') !== null && $priceCount == null)
                    {
                    $brand_id = explode(",",$request->input('brand_id')); // lấy dữ liệu brand_id
                // step 2 : lấy list sản phẩm theo thể loại
                    $products = Product::where(['is_active' => 1])
                                        ->whereIn('category_id' , $ids)
                                        ->whereIn('brand_id', $brand_id)
                                         ->get();
                    }
                    else {
                           $products = Product::where(['is_active' => 1])
                                        ->whereIn('category_id' , $ids)
                                        ->orderBy('id', 'desc')
                                         ->get();
                    }
                    return view('shop.filterProduct',[
                    'category' => $category,
                    'products' => $products,
                    'i'        => $i
                ]);
            } else {
                return $this->notfound();
            }
        }
        public function ViewBlog($slug, $id)
        {
        $blogs = Blog::findorFail($id);
        return view('shop.blog',['blogs' => $blogs]);
        }
        public function BlogDetails()
        {
            $blogs = Blog::all();
            return view('shop.blog-detalis',['blogs' => $blogs]);
        }
        public function dksd()
        {
            return view('shop.dksd');
        }



}
