@extends('admin.layout.main')
@section('content')
<div class="row page-title">
                            <div class="col-md-12">
                                <div aria-label="breadcrumb" class="float-right mt-1">
                                    <a class="btn btn-primary" href="{{route('admin.banner.create')}}">Thêm mới</a>
                                </div>
                                <h4 class="mb-1 mt-0">Danh sách</h4>
                            </div>
</div>
                <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mt-0 mb-1">Banner</h4>
    
                                        <div class="table-responsive">
                                            <table class="table m-0">
                                                <thead>
                                                    <tr>
                                                        <th>Tên</th>
                                                        <th>Ảnh</th>
                                                        <th>Target</th>
                                                        <th>Trạng Thái</th>
                                                        <th>Vị trí</th>
                                                        <th>Thao tác</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                	@foreach($data as $key => $item)
                                                    <tr class="item-{{$item->id}}">
                                                        <td>{{$item->title}}</td>
                                                        <td>
                                                            <img src="{{asset($item->image)}}" alt="{{$item->slug}}" height="50px">
                                                        </td>
                                                        <td>{{$item->target = 0 ? '' : '_blank'  }}</td>
                                                        <td>{{$item->is_active !=0 ? 'Hiển thị' : 'Ẩn'  }}</td>
                                                        <td>{{$item->position}}</td>
                                                        <td>
                                                            <a class="btn btn-success" href="{{route('admin.category.show', ['id'=> $item->id ])}}">Xem</a>
                                                            <a class="btn btn-primary" href="{{route('admin.category.edit', ['id'=> $item->id ])}}">Sửa</a>
                                                            <a class="btn btn-danger" href="javascript:void(0)" onclick="delete_model({{$item->id}},'category')">Xóa</a>
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