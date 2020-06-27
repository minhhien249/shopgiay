
@extends('admin.layouts.main')
@section('content')
<div class="row page-title">
    <div class="col-md-12">
        <div aria-label="breadcrumb" class="float-right mt-1">
            <a class="btn btn-primary" href="{{route('admin.product.create')}}">Thêm mới</a>
        </div>
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
                                <th style="width: 225px;">Tên Sản Phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Số lượng</th>
                                <th>Sản phẩm Hot</th>
                                <th>Vị trí</th>
                                <th>Trạng thái</th>
                                <th class="text-center">Hành động</th>
                            </tr>
                            </tbody>
                            <!-- Lặp một mảng dữ liệu pass sang view để hiển thị -->
                            @foreach($data as $key => $item)
                                <tr class="item-{{ $item->id }}"> <!-- Thêm Class Cho Dòng -->
                                    <td>{{++$key }}</td>
                                    <td>{{ substr($item->name,0) }}</td>
                                    <td>
                                        @if ($item->image) <!-- Kiểm tra hình ảnh tồn tại -->
                                            <img src="{{asset($item->image)}}" width="50" height="50">
                                        {{-- <img src="{{asset($item->image)}}" width="50" height="50"> --}}
                                        @endif
                                    </td>
                                    <td>{{ $item->stock }}</td>
                                    <td>{{ ($item->is_hot == 1) ? 'Có' : 'Không' }}</td>
                                    <td>{{ $item->position }}</td>
                                    <td>{{ ($item->is_active == 1) ? 'Hiển thị' : 'Ẩn' }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-success" href="{{route('admin.product.show', ['id'=> $item->id ])}}">Xem</a>
                                        <a class="btn btn-primary" href="{{route('admin.product.edit', ['id'=> $item->id ])}}">Sửa</a>
                                        <a class="btn btn-danger" href="javascript:void(0)" onclick="delete_model({{$item->id}},'product')">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin">
                            {{ $data->links() }}
                        </ul>
                    </div>
                       </div>
                   </div>
                </div>
                <!-- /.box -->
        </div>
        <!-- /.row -->

@endsection
