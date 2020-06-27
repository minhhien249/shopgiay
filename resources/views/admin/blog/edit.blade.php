@extends('admin.layouts.main')
@section('content')
<section class="content-header">
        <div class="row page-title">
                            <div class="col-md-12">
                                <div aria-label="breadcrumb" class="float-right mt-1">
                                    <a class="btn btn-primary" href="{{route('admin.blog.index')}}">Danh sách</a>
                                </div>
                                <h4 class="mb-1 mt-0">Sửa tin tức</h4>
                            </div>
</div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-body">

            <form role="form" action="{{route('admin.blog.update', ['id'=>$blog->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Thương Hiệu</label>
                                <input value="{{ $blog->title }}" type="text" class="form-control" id="name" name="title" placeholder="Nhập tên tiêu đề">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Thay đổi ảnh</label><br>
                                <input type="file" id="new_image" name="new_image">
                                <!-- Hiển thị ảnh cũ -->
                                <br>
                                <img src="{{ asset($blog->image) }}" width="250">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">WebSite</label>
                                <input value="{{ $blog->url }}" type="text" class="form-control" id="url" name="url" placeholder="Url">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Vị trí</label>
                                <input type="number" class="form-control" id="position" name="position" placeholder="Nhập tên vị trí" value="{{ $blog->position }}">
                            </div>
                            <div class="form-group mb-3">
                                <div class="custom-control custom-checkbox form-check">
                                    <input  type="checkbox" class="custom-control-input" id="invalidCheck" value="1" name="is_active"  {{ ($blog->is_active == 1) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="invalidCheck">Trạng thái</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nội Dung</label>
                                <textarea id="editor1" name="description" class="form-control" rows="15" placeholder=" ...">{!! $blog->description !!}</textarea>
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
@section('my_javascript')
    <script type="text/javascript">
        $(function () {
            // setup textarea sử dụng plugin CKeditor
            var _ckeditor = CKEDITOR.replace('editor1');
            _ckeditor.config.height = 200; // thiết lập chiều cao
        })
    </script>
@endsection
