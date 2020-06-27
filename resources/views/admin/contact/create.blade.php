@extends('admin.layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            Thêm Mới Sản Phẩm <a href="{{route('admin.product.index')}}" class="btn btn-success pull-right ml-5"><i class="fa fa-list"></i> Danh Sách</a>
        </h1>
    </section>

    <section class="content">
        <div class="card-body">

            <form role="form" action="{{route('admin.product.store')}}" method="post"  enctype="multipart/form-data">
            {{-- <form role="form" action="{{route('admin.product.store')}}" method="post" class="dropzone" id="dropzone" enctype="multipart/form-data"> --}}
                @csrf

                <div class="form-group mb-3">
                    <label for="name">Tên Sản Phẩm</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên ">
                </div>
                <div class="form-group mb-3">
                    <label for="image">Hình ảnh Chính</label>
                    <br>
                   <input type="file" id="image" name="image">
                </div>
                <div class="form-group mb-3">
                    <label for="filename">Hình ảnh Phụ</label>
                    <br>
                   <input type="file" id="" name="filename[]">
                </div>
                <div class="form-group mb-3">
                    <label for="filename">Hình ảnh Phụ</label>
                    <br>
                   <input type="file" id="" name="filename[]">
                </div>
                <div class="form-group mb-3">
                    <label for="stock">Số lượng</label>
                    <input type="text" class="form-control" id="stock" name="stock" placeholder="Nhập số lượng ">
                </div>
                <div class="form-group mb-3">
                    <label for="price">Gía Gốc (vnđ)</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="Nhập giá gốc    ">
                </div>
                <div class="form-group mb-3">
                    <label for="sale">Giá Khuyến Mãi(vnđ)</label>
                    <input type="text" class="form-control" id="sale" name="sale" placeholder="Nhập giá khuyến mãi ">
                </div>
                <div class="form-group">
                    <label for="category_id">Danh mục Sản Phẩm</label>
                    <select class="form-control" name="category_id">
                        <option value="0">-- chọn --</option>
                        @foreach($categories as $category)
                            <option  value="{{ $category -> id }}">{{ $category -> name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label>Thương Hiệu</label>
                    <select class="form-control" name="brand_id">
                        <option value="0">-- chọn --</option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand -> id }}">{{ $brand -> name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Nhà Cung Cấp</label>
                    <select class="form-control" name="vendor_id">
                        <option value="0">-- chọn --</option>
                        @foreach($vendors as $vendor)
                            <option value="{{ $vendor -> id }}">{{ $vendor -> name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="sku">Mã Hàng(SKU)</label>
                    <input type="text" class="form-control" id="sku" name="sku" placeholder="Nhập mã hàng ">
                </div>
                <div class="form-group mb-3">
                    <label for="position">Vị Trí</label>
                    <input type="text" class="form-control" id="position" name="position" placeholder="Nhập vị trí ">
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox form-check">
                        <input  type="checkbox" class="custom-control-input" id="Check" value="1" name="is_hot">
                        <label class="custom-control-label ml-3" for="Check"> Sản phẩm Hot</label>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <div class="custom-control custom-switch mb-2 pl-5">
                        <input type="checkbox" class="custom-control-input" id="customSwitch1" value="1" name="is_active">
                        <label class="custom-control-label" for="customSwitch1">Trạng thái</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="url">Liên kết (url) tùy chỉnh</label>
                    <input type="text" class="form-control" id="url" name="url" placeholder="">
                </div>
                <div class="form-group">
                    <label for="summary">Tóm tắt</label>
                    <textarea value="" id="editor2" name="summary" class="form-control" rows="10" ></textarea>
                </div>

                <div class="form-group">
                    <label for="description">Mô tả</label>
                    <textarea value="" id="editor1" name="description" class="form-control" rows="10" ></textarea>
                </div>
                <div class="form-group">
                    <label for="meta_title">Meta Title</label>
                    <input type="text" class="form-control" id="meta_title" name="meta_title" >
                </div>
                <div class="form-group">
                    <label for="meta_description">Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="3" ></textarea>
                </div>

                <button class="btn btn-primary" type="submit">Tạo</button>


            </form>
        </div>
    </section>
@endsection
@section('my_javascript')
    <script type="text/javascript">
        $(function () {
            // setup textarea sử dụng plugin CKeditor
            var _ckeditor = CKEDITOR.replace('editor1');
            _ckeditor.config.height = 200; // thiết lập chiều cao
        })
    </script>
@endsection

