@extends('admin.layout.main')
@section('content')
    <div class="row page-title">
                            <div class="col-md-12">
                                <div aria-label="breadcrumb" class="float-right mt-1">
                                    <a class="btn btn-primary" href="{{route('admin.vendor.create')}}">Thêm mới</a>
                                </div>
                                <h4 class="mb-1 mt-0">Danh sách</h4>
                            </div>
    </div>
    <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mt-0 mb-1">Category</h4>
    
                                        <div class="table-responsive">
                                            <table class="table m-0">
                                                <thead>
                                                    <tr>
                                                        <th>Tên</th>
                                                        <th>Email</th>
                                                        <th>SĐT</th>
                                                        <th>Website</th>
                                                        <th>Ảnh</th>
                                                        <th>Trạng Thái</th>
                                                        <th>Vị trí</th>
                                                        <th>Thao tác</th>
                                                    </tr>
                                                </thead>
                            
                                                <tbody>
                                                    @foreach($data as $item)
                                                    <tr class="item-{{$item->id}}">
                                                        <td>{{$item->name}}</td>
                                                        <td>{{$item->email}}</td>
                                                        <td>{{$item->phone}}</td>
                                                        <td>{{$item->website}}</td>
                                                        <td>
                                                            @if ($item->image) <!-- Kiểm tra hình ảnh tồn tại -->
                                                            <img src="{{asset($item->image)}}" width="50" height="50">
                                                             @endif
                                                        </td>
                                                        <td>{{$item->is_active !=0 ? 'Hiển thị' : 'Ẩn'}}</td>
                                                        <td>{{$item->position}}</td>
                                                        <td>
                                                            <a class="btn btn-success" href="{{route('admin.vendor.show', ['id'=> $item->id ])}}">Xem</a>
                                                            <a class="btn btn-primary" href="{{route('admin.vendor.edit', ['id'=> $item->id ])}}">Sửa</a>
                                                            <a class="btn btn-danger" href="javascript:void(0)" onclick="delete_model({{$item->id}},'vendor')">Xóa</a>
                                                        </td>
                                                    </tr>         
                                                    @endforeach                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
@endsection