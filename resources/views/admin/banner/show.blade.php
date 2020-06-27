@extends('admin.layouts.main')
@section('content')
<div class="row page-title">
                            <div class="col-md-12">
                                <div aria-label="breadcrumb" class="float-right mt-1">
                                    <a class="btn btn-primary" href="{{route('admin.banner.index')}}">Danh sách</a>
                                </div>
                                <h4 class="mb-1 mt-0">Chi tiết banner</h4>
                            </div>
</div>
                <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table m-0">
                                                <tbody>
                                                    <tr>
                                                        <td><b>Tên danh mục:</b></td>
                                                        <td>{{ $data->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Hình ảnh:</b></td>
                                                        <td><img src="{{ asset($data->image) }}" width="250"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Danh mục cha:</b></td>
                                                        <td>{{ $data->parent['name'] ? $data->parent['name'] : '(trống)' }}</td>
                                                    </tr>
                                                      <tr>
                                                         <td><b>Vị trí:</b></td>
                                                         <td>{{ $data->position }}</td>
                                                      </tr>
                                                     <tr>
                                                         <td><b>Trạng thái</b></td>
                                                         <td>{{ $data->is_active  ? 'Hiển Thị' : 'Ẩn' }}</td>
                                                     </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
@endsection
