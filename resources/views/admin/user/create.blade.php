@extends('admin.layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            Thêm mới  <a href="{{route('admin.user.index')}}" class="btn btn-success pull-right ml-5"><i class="fa fa-list"></i> Danh Sách</a>
        </h1>
    </section>

    <section class="content">
        <div class="card-body">

            <form role="form" action="{{route('admin.user.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Họ và Tên</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nhập Tên">
                    </div>
                    <div class="form-group">
                        <label for="avatar">Ảnh</label><br>
                        <input type="file" id="avatar" name="avatar">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" >
                    </div>
                    <div class="form-group">
                        <label for="password">Mật Khẩu</label>
                        <input type="password" class="form-control" id="password" name="password" >
                    </div>
                    <div class="form-group">
                        <label>Chọn Quyền</label>
                        <select class="form-control" name="role_id">
                            <option value="1" >Manager</option>
                            <option value="2">Administrator</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <div class="custom-control custom-checkbox form-check">
                            <input  type="checkbox" class="custom-control-input" id="invalidCheck" value="1" name="is_active">
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
