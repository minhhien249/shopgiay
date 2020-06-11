@extends('admin.layouts.main')
@section('content')
    <section class="content-header">
        <h1>
           Sửa mới  <a href="{{route('admin.brand.index')}}" class="btn btn-success pull-right ml-5"><i class="fa fa-list"></i> Danh Sách</a>
        </h1>
    </section>

    <section class="content">
        <div class="card-body">

            <form role="form" action="{{route('admin.brand.update', ['id'=>$brand->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Thương Hiệu</label>
                                <input value="{{ $brand->name }}" type="text" class="form-control" id="name" name="name" placeholder="Nhập tên tiêu đề">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Thay đổi ảnh</label>
                                <input type="file" id="new_image" name="new_image">
                                <!-- Hiển thị ảnh cũ -->
                                <br>
                                <img src="{{ asset($brand->image) }}" width="250">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">WebSite</label>
                                <input value="{{ $brand->website }}" type="text" class="form-control" id="website" name="website" placeholder="Url">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Vị trí</label>
                                <input type="number" class="form-control" id="position" name="position" placeholder="Nhập tên vị trí" value="{{ $brand->position }}">
                            </div>
                            <div class="form-group mb-3">
                                <div class="custom-control custom-checkbox form-check">
                                    <input  type="checkbox" class="custom-control-input" id="invalidCheck" value="1" name="is_active"  {{ ($brand->is_active == 1) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="invalidCheck">Trạng thái</label>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
            </form>

        </div>
        <!-- /.row -->
    </section>
@endsection
