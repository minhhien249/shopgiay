
@extends('admin.layouts.main')
@section('content')
<div class="row page-title">
    <div class="col-md-12">
        <h4 class="mb-1 mt-0">Danh sách</h4>
    </div>
</div>
        <div class="row">
            <div class="col-lg-12">
                   <div class="card">
                       <div class="card-body">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                            <tbody>
                            <tr>
                                <th>STT</th>
                                <th>Tên khách hàng</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Trạng thái</th>
                                <th class="text-center">Hành động</th>
                            </tr>
                            </tbody>
                            <!-- Lặp một mảng dữ liệu pass sang view để hiển thị -->
                            @foreach($data as $key => $item)
                                <tr class="item-{{ $item->id }}"> <!-- Thêm Class Cho Dòng -->
                                    <td>{{++$key }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>@if ($item->order_status_id === 1)
                                            <span class="badge badge-info badge-pill">Mới</span>
                                        @else
                                            <span class="badge badge-success badge-pill">Đã xử lý</span>
                                        @endif</td>
                                    <td class="text-center">
                                        <a class="btn btn-primary" href="{{route('admin.contact.edit', ['id'=> $item->id ])}}">Chi tiết</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin">
                            
                        </ul>
                    </div>
                       </div>
                   </div>
                </div>
                <!-- /.box -->
        </div>
        <!-- /.row -->

@endsection
