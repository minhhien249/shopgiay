@extends('admin.layouts.main')
@section('content')
<section class="content-header">
        <div class="row page-title">
                            <div class="col-md-12">
                                <div aria-label="breadcrumb" class="float-right mt-1">
                                    <a class="btn btn-primary" href="{{route('admin.blog.index')}}">Danh sách</a>
                                </div>
                                <h4 class="mb-1 mt-0">Chi tiết tin tức</h4>
                            </div>
</div>
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
                                    <td><b>Tiêu đề:</b></td>
                                    <td>{{ $data->title }}</td>
                                </tr>
                                <tr>
                                    <td><b>Hình ảnh:</b></td>
                                    <td><img src="{{ asset($data->image) }}" width="250"></td>
                                </tr>
                                <tr>
                                    <td><b>Website:</b></td>
                                    <td>{{ $data->url }}</td>
                                </tr>
                                <tr>
                                    <td><b>Người đăng:</b></td>
                                    <td>{{ $data->username['name'] }}</td>
                                </tr>
                                <tr>
                                    <td><b>Vị trí:</b></td>
                                    <td>{{ $data->position }}</td>
                                </tr>
                                <tr>
                                    <td><b>Trạng thái</b></td>
                                    <td>{{ ($data->is_active == 1) ? 'Hiển thị' : 'Ẩn'  }}</td>
                                </tr>
                                <tr>
                                    <td><b>Chi tiết</b></td>
                                    <td>{!! $data->description !!}</td>
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
