<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;
class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Vendor::all();
        return view('admin.vendor.index',[
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
        $data = Vendor::all();
        return view('admin.vendor.create',[
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
            'name' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ]);
        // khởi tạo đối tượng
        $vendor = new Vendor;
        $vendor->name = $request->input('name');
        $vendor->slug = str_slug($request->input('name'));
        $vendor->email = $request->input('email');
        $vendor->phone = $request->input('phone');
        if ($request->hasFile('image')) {
            // get file
            $file = $request->file('image');
            // get ten
            $filename = time().'_'.$file->getClientOriginalName();
            // duong dan upload
            $path_upload = 'uploads/vendor/';
            // upload file
            $request->file('image')->move($path_upload,$filename);

            $vendor->image = $path_upload.$filename;
        }
        $vendor->website = $request->input('website');
        $vendor->website = $request->input('address');
        $vendor->position= $request->input('position');
        $is_active = 0;
        if($request->has('is_active'))
        {
            $is_active = $request->input('is_active');
        }
        $vendor->is_active = $is_active;
        $vendor->save();
        return redirect()->route('admin.vendor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Vendor::all();
        $vendor =Vendor::findorFail($id);
        return view('admin.vendor.show',[
            'data' => $data,
            'vendor' => $vendor
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
        $data = Vendor::find($id);
        return view('admin.vendor.edit',[
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
        // khởi tạo đối tượng
        $vendor = Vendor::findorFail($id);
        $vendor->name = $request->input('name');
        $vendor->slug = str_slug($request->input('name'));
        $vendor->email = $request->input('email');
        $vendor->phone = $request->input('phone');
        if ($request->hasFile('new_image')) {
            // xóa file cũ
            @unlink(public_path($vendor->image));
            // get file mới
            $file = $request->file('new_image');
            // get tên
            $filename = time().'_'.$file->getClientOriginalName();
            // duong dan upload
            $path_upload = 'uploads/category/';
            // upload file
            $request->file('new_image')->move($path_upload,$filename);

            $vendor->image = $path_upload.$filename;
        }
        $vendor->website = $request->input('website');
        $vendor->position= $request->input('position');
        $is_active = 0;
        if($request->has('is_active'))
        {
            $is_active = $request->input('is_active');
        }
        $vendor->is_active = $is_active;
        $vendor->save();
        return redirect()->route('admin.vendor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Vendor::destroy($id);
        return response()->json([
            'status' => true
        ], 200);
    }
}
