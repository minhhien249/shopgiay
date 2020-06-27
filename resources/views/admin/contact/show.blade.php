@extends('admin.layouts.main')
@section('content')
<div class="row page-title">
                            <div class="col-md-12">
                                <div aria-label="breadcrumb" class="float-right mt-1">
                                    <a class="btn btn-primary" href="{{route('admin.product.index')}}">Danh sách</a>
                                </div>
                                <h4 class="mb-1 mt-0">Chi tiết Sản Phẩm</h4>
                            </div>
</div>
                <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mt-0 mb-1">Category</h4>

                                        <div class="table-responsive">
                                            <table class="table m-0">
                                                <tbody>
                                                    <tr>
                                                        <td><b>Tên sản phẩm:</b></td>
                                                        <td>{{ $data->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Hình ảnh:</b></td>
                                                        <td>
                                                            @if ($data->image) <!-- Kiểm tra hình ảnh tồn tại -->
                                                                <img src="{{asset($data->image)}}" width="50" height="50">
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Sơ lược:</b></td>
                                                        <td>{!! $data->summary !!}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Mô tả:</b></td>
                                                        <td>{!! $data->description !!}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Gía gốc:</b></td>
                                                        <td>{{ number_format($data->price) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Gía khuyến mãi:</b></td>
                                                        <td>{{ number_format($data->sale) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Vị trí:</b></td>
                                                        <td>{{ $data->position }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Trạng thái</b></td>
                                                        <td>@if($data->is_active ==0)Ẩn @else Hiển thị @endif</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Sản phẩm hot:</b></td>
                                                        <td>@if( $data->is_hot ==0)Không hot @else Sản phẩm hot @endif</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Lượng views:</b></td>
                                                        <td>{{ $data->views }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Danh mục sản phẩm:</b></td>
                                                        <td>{{ $category_name->name }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
@endsection
