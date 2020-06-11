@extends('admin.layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            Chỉnh sửa thông tin sản phẩm <a href="{{route('admin.product.index')}}" class="btn btn-success pull-right "><i
                class="fa fa-list"></i> Danh Sách </a>
        </h1>
    </section>

    <section class="content">
        <div class="card-body">

            <form role="form" action="{{route('admin.product.update', ['id' => $product->id ])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Tên Sản Phẩm</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên" value="{{ $product->name }}">
                </div>
                <div class="form-group mb-3">
                    <label for="exampleInputFile">Thay đổi ảnh sản phẩm</label>
                    <input type="file" id="new_image" name="new_image"><br>
                    @if ($product->image)
                        <img src="{{asset($product->image)}}" width="200">
                    @endif
                </div>
                <div class="form-group mb-3">
                    <label for="stock">Số lượng</label>
                <input value="{{ $product->stock }}" type="text" class="form-control" id="stock" name="stock" placeholder="Số lượng">
                </div>
                <div class="form-group">
                    <label for="price">Giá Gốc(vnđ)</label>
                    <input value="{{ $product->price }}" type="text" class="form-control" id="price" name="price" placeholder="Giá Gốc">
                </div>
                <div class="form-group mb-3">
                    <label for="sale">Giá Khuyến Mãi(vnđ)</label>
                    <input value="{{ $product->sale }}" type="text" class="form-control" id="sale" name="sale" placeholder="Giá KM">
                </div>
                <div class="form-group">
                    <label for="category_id">Danh mục Sản Phẩm</label>
                    <select class="form-control" name="category_id">
                        <option value="0">-- chọn --</option>
                        @foreach($categories as $category)
                            <option {{ ($product->category_id == $category->id ? 'selected':'') }} value="{{ $category -> id }}">{{ $category -> name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="brand_id">Thương Hiệu</label>
                    <select class="form-control" name="brand_id">
                        <option value="0">-- chọn --</option>
                        @foreach($brands as $brand)
                            <option {{ ($product->brand_id == $brand->id ? 'selected':'') }} value="{{ $brand -> id }}">{{ $brand -> name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Nhà Cung Cấp</label>
                    <select class="form-control" name="vendor_id">
                        <option value="0">-- chọn --</option>
                        @foreach($vendors as $vendor)
                            <option {{ ($product->vendor_id == $vendor->id ? 'selected':'') }} value="{{ $vendor -> id }}">{{ $vendor -> name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="sku">Mã hàng (SKU)</label>
                    <input value="{{ $product->sku }}" type="text" class="form-control w-50" id="sku" name="sku" placeholder="">
                </div>
                <div class="form-group">
                    <label for="position">Vị trí</label>
                    <input value="{{ $product->position }}" type="text" class="form-control" id="position" name="position" placeholder="Nhập tên vị trí" value="0">
                </div>
                <div class="form-group mb-3">
                    <div class="form-group mb-3">
                        <div class="custom-control custom-switch mb-2 pl-5">
                            <input {{ ($product->is_active) ? 'checked':'' }} type="checkbox" class="custom-control-input" id="customSwitch1" value="1" name="is_active">
                            <label class="custom-control-label" for="customSwitch1">Trạng thái</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                        <div class="custom-control custom-checkbox form-check">
                            <input {{ ($product->is_hot) ? 'checked':'' }}  type="checkbox" class="custom-control-input" id="Check" value="1" name="is_hot">
                            <label class="custom-control-label" for="Check">Sản phẩm Hot</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="url">Liên kết (url) tùy chỉnh</label>
                    <input value="{{ $product->url }}" type="text" class="form-control" id="url" name="url" placeholder="">
                </div>
                <div class="form-group">
                    <label for="summary">Tóm tắt</label>
                    <textarea value="" id="editor2" name="summary" class="form-control" rows="10" >{{ $product->summary }}</textarea>
                </div>

                <div class="form-group">
                    <label for="description">Mô tả</label>
                    <textarea value="" id="editor1" name="description" class="form-control" rows="10" >{{ $product->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="meta_title">Meta Title</label>
                    <input value="{{ $product->meta_title }}" type="text" class="form-control" id="meta_title" name="meta_title" >
                </div>
                <div class="form-group">
                    <label for="meta_description">Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="3" >{{ $product->meta_description }}</textarea>
                </div>
                <button class="btn btn-primary" type="submit">Lưu</button>

            </form>

        </div>
        <!-- /.row -->
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
