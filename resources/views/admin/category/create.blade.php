@extends('admin.layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            Thêm mới danh mục <a href="{{route('admin.category.index')}}" class="btn btn-success pull-right ml-5"><i class="fa fa-list"></i> Danh Sách</a>
        </h1>
    </section>

    <section class="content">
        <div class="card-body">

            <form role="form" action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Danh mục cha</label>
                    <select class="form-control" name="parent_id">
                        <option value="0">Chọn</option>
                        @foreach($data as $item)
                            <option value="{{ $item -> id }}">{{ $item -> name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="name">Tên Danh Mục</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên danh mục">
                </div>
                <div class="form-group mb-3">
                    <label for="image">Hình ảnh</label>
                    <br>
                    <input type="file" class="" id="image" name="image" placeholder="Hình Ảnh">
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
