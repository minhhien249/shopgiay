@extends('admin.layouts.main')
@section('content')
<section class="content-header">
        <h1>
            Danh Sách Banner <a href="{{route('admin.banner.create')}}" class="btn btn-info pull-right ml-5"><i class="fa fa-plus"></i> Thêm Banner</a>
        </h1>
    </section>
    <section class="content">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th>Tiêu đề</th>
                                        <th>Hình ảnh</th>
                                        <th>Target</th>
                                        <th>Loại</th>
                                        <th>Vị trí</th>
                                        <th>Trạng thái</th>
                                        <th class="text-center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key => $item)
                                <tr class="item-{{ $item->id }}"> <!-- Thêm Class Cho Dòng -->
                                    <td>{{ $item->title }}</td>
                                    <td>
                                        @if ($item->image) <!-- Kiểm tra hình ảnh tồn tại -->
                                            <img src="{{asset($item->image)}}" width="50" height="50">
                                        @endif
                                    </td>
                                    <td>{{ ($item->target == 1) ? '_blank' : '_self' }}</td>
                                    <td>{{ ($item->type == 1) ? 'slide' : 'background' }}</td>
                                    <td>{{ $item->position }}</td>
                                    <td>{{ ($item->is_active == 1) ? 'Hiển thị' : 'Ẩn' }}</td>
                                    <td class="text-center">
                                        <a href="{{route('admin.banner.show', ['id'=> $item->id ])}}" class="btn btn-warning">Xem</a>
                                        <a href="{{route('admin.banner.edit', ['id'=> $item->id])}}" class="btn btn-info">Sửa</a>
                                        <!-- Thêm sự kiện onlick cho nút xóa -->
                                        <a href="javascript:void(0)" class="btn btn-danger" onclick="delete_model({{ $item->id }},'banner')" >Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="box-footer clearfix">
                            <ul class="pagination pagination-sm no-margin">
                                {{ $data->links() }} {{-- nút bấm phân trang --}}
                            </ul>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!-- /.row -->
    </section>
@endsection