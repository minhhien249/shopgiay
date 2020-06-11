<?php

namespace App\Http\Controllers;
use App\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Banner::all();
        return view('admin.banner.index',[
        	'data' => $data
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$data = Banner::all();
        return view('admin.banner.create',[
        	'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ]);
        //luu vào csdl
        $banner = new Banner;
        $banner->title = $request->input('title');
        $banner->slug = str_slug($request->input('title'));
        if ($request->hasFile('image')) {
            // get file
            $file = $request->file('image');
            // get ten
            $filename = time().'_'.$file->getClientOriginalName();
            // duong dan upload
            $path_upload = 'uploads/banner/';
            // upload file
            $request->file('image')->move($path_upload,$filename);

            $banner->image = $path_upload.$filename;
        }
        $banner->url = $request->input('url');
        $banner->target = $request->input('Target');
        $banner->description = $request->input('description');
        $banner->position = $request->input('position');
        $is_active = 0;
        if ($request->has('is_active')){//kiem tra is_active co ton tai khong?
            $is_active = $request->input('is_active');
        }
        $banner->is_active = $is_active;
        $banner->save();

        // chuyen dieu huong trang
        return redirect()->route('admin.banner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Banner::find($id);
        return view('admin.banner.show',[
        	'data' => $data
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.banner.edit',[
        	'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ]);
        //luu vào csdl
        $banner = Banner::findorFail($id);
        $banner->title = $request->input('name');
        $banner->slug = str_slug($request->input('name'));
        if ($request->hasFile('new_image')) { // dòng này Kiểm tra xem có image có được chọn
            // xóa file cũ
            @unlink(public_path($brand->image)); // hàm unlink của PHP không phải laravel , chúng ta thêm @ đằng trước tránh bị lỗi
            // get new_image
            $file = $request->file('new_image');
            // đặt tên cho file new_image
            $filename = time().'_'.$file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/banner/';
            // Thực hiện upload file
            $request->file('new_image')->move($path_upload,$filename);

            $brand->image = $path_upload.$filename; // gán giá trị ảnh mới cho thuộc tính image của đối tượng
        }
        $banner->url = $request->input('url');
        $banner->target = $request->input('name');
        $banner->description = $request->input('description');
        $banner->type = $request->input('description');
        $banner->position = $request->input('description');
        $is_active = 0;
        if ($request->has('is_active')){//kiem tra is_active co ton tai khong?
            $is_active = $request->input('is_active');
        }
        $banner->is_active = $is_active;
        $banner->save();

        // chuyen dieu huong trang
        return redirect()->route('admin.banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::banner($id);
        return response()->json([
            'status' => true
        ], 200);
    }
}
