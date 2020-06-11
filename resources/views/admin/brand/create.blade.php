@extends('admin.layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            Thêm mới  <a href="{{route('admin.brand.index')}}" class="btn btn-success pull-right ml-5"><i class="fa fa-list"></i> Danh Sách</a>
        </h1>
    </section>

    <section class="content">
        <div class="card-body">

            <form role="form" action="{{route('admin.brand.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên Thương Hiệu</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Ảnh</label><br>
                        <input type="file" id="image" name="image">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Website</label>
                        <input type="text" class="form-control" id="website" name="website" placeholder="Url">
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
