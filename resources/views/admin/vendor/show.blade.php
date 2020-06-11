@extends('admin.layout.main')
@section('content')
<div class="row page-title">
                            <div class="col-md-12">
                                <div aria-label="breadcrumb" class="float-right mt-1">
                                    <a class="btn btn-primary" href="{{route('admin.vendor.index')}}">Danh sách</a>
                                </div>
                                <h4 class="mb-1 mt-0">Chi tiết Vendor</h4>
                            </div>
</div>
                <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mt-0 mb-1">Vendor</h4>
    
                                        <div class="table-responsive">
                                            <table class="table m-0">
                                                <tbody>
                                                    <tr>
                                                        <td><b>Tên danh mục:</b></td>
                                                        <td>{{ $vendor->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Email:</b></td>
                                                        <td>{{ $vendor->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>SĐT:</b></td>
                                                        <td>{{ $vendor->phone }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Hình ảnh:</b></td>
                                                        <td>
                                                            <img src="{{asset($vendor->image)}}" alt="{{$vendor->slug}}" width="40px" height="40px">
                                                        </td>
                                                    </tr>
                                                      <tr>
                                                         <td><b>Website:</b></td>
                                                         <td>{{ $vendor->website }}</td>
                                                      </tr>
                                                      <tr>
                                                         <td><b>Địa chỉ:</b></td>
                                                         <td>{{ $vendor->address }}</td>
                                                      </tr>
                                                      <tr>
                                                         <td><b>Vị trí:</b></td>
                                                         <td>{{ $vendor->position }}</td>
                                                      </tr>
                                                     <tr>
                                                         <td><b>Trạng thái</b></td>
                                                         <td>{{ $vendor->is_active ? 'Hiển thị' : 'Ẩn'}}</td>
                                                     </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
@endsection
