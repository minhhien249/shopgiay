@extends('admin.layouts.main')
@section('content')
<section class="content-header">
    <h1>
        Chi Tiết Danh Mục <a href="{{route('admin.category.index')}}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Danh sách Danh Mục</a>
    </h1>
</section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table m-0">
                            <tbody>
                            <tr>
                                <td><b>Tên danh mục:</b></td>
                                <td>{{ $data->name }}</td>
                            </tr>
                            <tr>
                                <td><b>Hình ảnh:</b></td>
                                <td>{{ $data->image }}</td>
                            </tr>
                            <tr>
                                <td><b>Danh mục cha:</b></td>
                                <td>{{ $data->parent['name'] ?$data->parent['name'] : 'trống' }}</td>
                            </tr>
                            <tr>
                                <td><b>Vị trí:</b></td>
                                <td>{{ $data->position }}</td>
                            </tr>
                            <tr>
                                <td><b>Trạng thái</b></td>
                                <td>{{ $data->is_active }}</td>
                            </tr>

                            </tbody></table>
                    </div>
                </div>
                <!-- /.box -->


            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
@endsection
