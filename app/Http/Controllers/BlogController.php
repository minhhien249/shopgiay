<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Blog::latest()->paginate(10); // sắp sếp theo thứ tự mới nhất && phân trang

        // gọi đến view
        return view('admin.blog.index', [
            'data' => $data // truyền dữ liệu sang view Index
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Blog::all(); // lấy toàn bộ dữ liệu
        // gọi đến view create
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //validate dữ liệu
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ]);

        //Khởi tạo Model và gán giá trị từ form cho những thuộc tính của đối tượng (cột trong CSDL)
        $blog = new Blog();
        $blog->title = $request->input('title');// tiêu đề


        if ($request->hasFile('image')) { // dòng này Kiểm tra xem có image có được chọn
            // get file
            $file = $request->file('image');
            // đặt tên cho file image
            $filename = time().'_'.$file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/category/'; // uploads/brand ; uploads/blog
            // Thực hiện upload file
            $request->file('image')->move($path_upload,$filename);

            $blog->image = $path_upload.$filename;
        }

        //user_id
        $blog->user_id = $request->input('user_id');
        // link bài viết
        $blog->url = $request->input('url');
         // vị trí
        $blog->position = $request->input('position');


        // Trạng thái
        if ($request->has('is_active')){//kiem tra is_active co ton tai khong?
            $blog->is_active = $request->input('is_active');
        }
        // nội dung
        $blog->description = $request->input('description');

        // Lưu
        $blog->save();

        // Chuyển hướng trang về trang danh sách
        return redirect()->route('admin.blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
                // get data from db
                $data = Blog::findorFail($id);

                return view('admin.blog.show', [
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
        // Sử dụng hàm findorFail tìm kiếm theo Id, nếu tìm thấy sẽ trả về object , nếu không trả về lỗi
        $blog = Blog::findorFail($id);

        return view('admin.blog.edit', [
            'blog' => $blog
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
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ]);

        $blog = Blog::findorFail($id);; // khởi tạo model
        $blog->title = $request->input('title');

        // Thay đổi ảnh
        if ($request->hasFile('new_image')) {
            // xóa file cũ
            @unlink(public_path($blog->image));
            // get file mới
            $file = $request->file('new_image');
            // get tên
            $filename = time().'_'.$file->getClientOriginalName();
            // duong dan upload
            $path_upload = 'uploads/product/';
            // upload file
            $request->file('new_image')->move($path_upload,$filename);

            $blog->image = $path_upload.$filename;
        }

        $blog->user_id = $request->input('user_id');
        $blog->url = $request->input('url');
        $blog->position = $request->input('position');

        // Trạng thái
        $blog->is_active = 0;
        if ($request->has('is_active')){//kiem tra is_active co ton tai khong?
            $blog->is_active = $request->input('is_active');
        }

        $blog->description = $request->input('description');


        $blog->save();

        // chuyển hướng đến trang
        return redirect()->route('admin.blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // gọi tới hàm destroy của laravel để xóa 1 object
        Blog::destroy($id);

        // Trả về dữ liệu json và trạng thái kèm theo thành công là 200
        return response()->json([
            'status' => true
        ], 200);
    }
}

