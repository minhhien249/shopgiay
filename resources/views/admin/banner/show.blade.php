@extends('admin.layouts.main')
@section('content')
<section class="content-header">
    <h1>
        Chi Tiết Banner <a href="{{route('admin.banner.index')}}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Danh sách Banner</a>
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
                                <td><b>Tiêu đề:</b></td>
                                <td>{{ $data->title }}</td>
                            </tr>
                            <tr>
                                <td><b>Hình ảnh:</b></td>
                                <td><img src="{{ asset($data->image) }}" width="250"></td>
                            </tr>
                            <tr>
                                <td><b>Liên kết Url:</b></td>
                                <td>{{ $data->url }}</td>
                            </tr>
                            <tr>
                                <td><b>Target</b></td>
                                <td>{{ ($data->target == 1) ? '_blank' : '_self' }}</td>
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
