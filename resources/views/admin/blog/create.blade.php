@extends('admin.layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            Thêm mới  <a href="{{route('admin.blog.index')}}" class="btn btn-success pull-right ml-5"><i class="fa fa-list"></i> Danh Sách</a>
        </h1>
    </section>

    <section class="content">
        <div class="card-body">

            <form role="form" action="{{route('admin.blog.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tiêu đề</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Nhập tiêu đề">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Ảnh</label><br>
                        <input type="file" id="image" name="image">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Website</label>
                        <input type="text" class="form-control" id="url" name="url" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Vị trí</label>
                        <input type="number" class="form-control" id="position" name="position" >
                    </div>
                    <div class="form-group mb-3">
                        <div class="custom-control custom-checkbox form-check">
                            <input  type="checkbox" class="custom-control-input" id="invalidCheck" value="1" name="is_active">
                            <label class="custom-control-label" for="invalidCheck">Trạng thái</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nội Dung Bài Viết</label>
                        <textarea id="editor1" name="description" class="form-control" rows="10" placeholder="Enter ..."></textarea>
                    </div>
                <button class="btn btn-primary" type="submit">Tạo</button>
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
