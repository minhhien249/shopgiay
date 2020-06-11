@extends('admin.layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            Danh Sách User <a href="{{route('admin.user.create')}}" class="btn btn-info pull-right ml-5"><i class="fa fa-plus"></i> Thêm User</a>
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
                                        <th>Họ & Tên</th>
                                        <th>Email</th>
                                        <th>Hình ảnh</th>
                                        <th>Phân Quyền</th>
                                        <th>Trạng thái</th>
                                        <th class="text-center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key => $item)
                                    <tr class="item-{{ $item->id }}"> <!-- Thêm Class Cho Dòng -->
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                        @if ($item->avatar) <!-- Kiểm tra hình ảnh tồn tại -->
                                            <img src="{{asset($item->avatar)}}" width="70">
                                            @endif
                                        </td>
                                        <td>{{ ($item->role_id == 1) ? 'Manager' : 'Admin' }}</td>
                                        <td>{{ ($item->is_active == 1) ? 'Kích hoạt' : 'Chưa kích hoạt' }}</td>
                                        <td class="text-center">
                                            <a href="{{route('admin.user.show', ['id'=> $item->id ])}}" class="btn btn-warning">Xem</a>
                                            <a href="{{route('admin.user.edit', ['id'=> $item->id])}}" class="btn btn-info">Sửa</a>
                                            <!-- Thêm sự kiện onlick cho nút xóa -->
                                            <a href="javascript:void(0)" class="btn btn-danger" onclick="delete_model({{ $item->id }},'user')" >Xóa</a>
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
