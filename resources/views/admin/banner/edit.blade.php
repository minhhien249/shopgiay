@extends('admin.layouts.main')
@section('content')
    <section class="content-header">
        <div class="row page-title">
    <div class="col-md-12">
        <div aria-label="breadcrumb" class="float-right mt-1">
            <a class="btn btn-primary" href="{{route('admin.banner.index')}}">Sửa banner</a>
        </div>
        <h4 class="mb-1 mt-0">Danh sách</h4>
    </div>
</div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-body">

            <form role="form" action="{{route('admin.banner.update', ['id'=>$banner->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label>Tiêu Đề</label>
                    <input value="{{$banner->title}}" type="text" class="form-control" id="title" name="title" placeholder="Nhập tên tiêu đề">
                </div>
                <div class="form-group mb-3">
                    <label for="exampleInputFile">Thay đổi ảnh </label>
                    <input type="file" id="new_image" name="new_image"><br>
                    @if ($banner->image)
                        <img src="{{asset($banner->image)}}" width="200">
                    @endif
                </div>
                <div class="form-group mb-3">
                    <label for="url">Tùy chỉnh liên kết</label>
                    <br>
                <input value="{{ $banner->url }}" type="text" class="form-control" id="url" name="url" placeholder="URL">
                </div>
                <div class="form-group mb-3">
                    <label>Target</label>
                    <select class="form-control" name="target">
                        <option value="1" {{ ($banner->target == 1) ? 'selected' : '' }} >_blank</option>
                        <option value="2" {{ ($banner->target == 2) ? 'selected' : '' }}>_self</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label>Loại</label>
                    <select class="form-control" name="type">
                        <option value="1" {{ ($banner->type == 1) ? 'selected' : '' }} >slide</option>
                        <option value="2" {{ ($banner->type == 2) ? 'selected' : '' }} >background</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Vị trí</label>
                <input value="{{ $banner->position }}" type="text" class="form-control" id="position" name="position" placeholder="Nhập tên vị trí" value="0">
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea id="editor1" name="description" class="form-control" rows="15" placeholder="Enter ...">{!! $banner->description !!}</textarea>
                </div>
                <div class="form-group mb-3">
                    <div class="custom-control custom-checkbox form-check">
                        <input {{ $banner->is_active }} type="checkbox" class="custom-control-input" id="invalidCheck" value="1" name="is_active">
                        <label class="custom-control-label" for="invalidCheck">Trạng thái</label>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Tạo</button>
            </form>

        </div>
        </div>
        <!-- /.row -->
    </section>
@endsection