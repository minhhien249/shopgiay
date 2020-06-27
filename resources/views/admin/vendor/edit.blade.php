@extends('admin.layouts.main')
@section('content')
    <section class="content-header">
        <div class="row page-title">
    <div class="col-md-12">
        <div aria-label="breadcrumb" class="float-right mt-1">
            <a class="btn btn-primary" href="{{route('admin.vendor.index')}}">Danh sách</a>
        </div>
        <h4 class="mb-1 mt-0">Sửa thông tin nhà cung cấp</h4>
    </div>
</div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-body">

            <form role="form" action="{{route('admin.vendor.update', ['id'=>$vendor->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Tên Nhà Cung Cấp</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên" value="{{ $vendor->name }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Nhập Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{$vendor->email}}">
                            </div>
                            <div class="form-group">
                                <label for="phone">Điện Thoại</label>
                                <input type="number" class="form-control" id="phone" name="phone" value="{{$vendor->phone}}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputFile">Thay đổi ảnh </label>
                                <input type="file" id="new_image" name="new_image"><br>
                                @if ($vendor->image)
                                    <img src="{{asset($vendor->image)}}" width="200">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="website">Website</label>
                            <input type="text" class="form-control" id="website" name="website" value="{{ $vendor->website }}" >
                            </div>
                            <div class="form-group">
                                <label for="address">Địa Chỉ</label><br>
                            <textarea name="address" id="address" cols="50" rows="2">{{$vendor->address}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="position">Vị trí</label>
                            <input type="number" class="form-control" id="position" name="position" value="{{$vendor->position}}">
                            </div>
                            <div class="form-group mb-3">
                                <div class="custom-control custom-checkbox form-check">
                                    <input {{ $vendor->is_active }} type="checkbox" class="custom-control-input" id="invalidCheck" value="1" name="is_active">
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
        </div>
        <!-- /.row -->
    </section>
@endsection
