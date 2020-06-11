@extends('admin.layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            Thêm mới Banner <a href="{{route('admin.banner.index')}}" class="btn btn-success pull-right ml-5"><i class="fa fa-list"></i> Danh Sách</a>
        </h1>
    </section>

    <section class="content">
        <div class="card-body">

            <form role="form" action="{{route('admin.banner.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label>Tiêu Đề</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Nhập tên tiêu đề">
                </div>
                <div class="form-group mb-3">
                    <label for="image">Ảnh</label><br>
                    <input type="file" class="" id="image" name="image" placeholder="Hình Ảnh">
                </div>
                <div class="form-group mb-3">
                    <label for="url">Tùy chỉnh liên kết</label>
                    <br>
                    <input type="text" class="" id="url" name="url" placeholder="URL">
                </div>
                <div class="form-group mb-3">
                    <label>Target</label>
                    <select class="form-control" name="target">
                        <option value="1">_blank</option>
                        <option value="2">_self</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label>Loại</label>
                    <select class="form-control" name="type">
                        <option value="1">slide</option>
                        <option value="2">background</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea id="editor1" name="description" class="form-control" rows="10" placeholder="Enter ..."></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Vị trí</label>
                    <input type="text" class="form-control" id="position" name="position" placeholder="Nhập tên vị trí" value="0">
                </div>
                <div class="form-group mb-3">
                    <div class="custom-control custom-checkbox form-check">
                        <input type="checkbox" class="custom-control-input" id="invalidCheck" value="1" name="is_active">
                        <label class="custom-control-label" for="invalidCheck">Trạng thái</label>
                    </div>
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
