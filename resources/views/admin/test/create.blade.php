@extends('admin.layout.main')
@section('content')
    <div class="row page-title">
                            <div class="col-md-12">
                                <div aria-label="breadcrumb" class="float-right mt-1">
                                    <a class="btn btn-primary" href="{{route('admin.vendor.index')}}">Danh sách</a>
                                </div>
                                <h4 class="mb-1 mt-0">Thêm mới</h4>
                            </div>
    </div>
	<div class="row">
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mt-0">Thêm mới Vendor</h4>
                                        <form class="form-horizontal" form role="form" action="{{route('admin.test.store')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                           <div class="row">
                                               <div class="col">
                                                   <div class="form-group row">
                                                        <div class="col-lg-2">
                                                            <input type="checkbox" class="form-control" id="simpleinput" name="soThich[]" value="Tổ lái">
                                                        </div>
                                                        <label class="col-lg-4 col-form-label" for="simpleinput">Tổ lái</label>
                                                        <div class="col-lg-2">
                                                            <input type="checkbox" class="form-control" id="simpleinput" value="Đua Xe" name="soThich[]">
                                                        </div>
                                                        <label class="col-lg-4 col-form-label" for="simpleinput">Đua Xe</label>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label" for="simpleinput">Email</label>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control" id="simpleinput" name="email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label" for="simpleinput">SĐT</label>
                                                        <div class="col-lg-10">
                                                            <input type="number" class="form-control" id="simpleinput" name="phone">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label" for="example-fileinput">Ảnh</label>
                                                        <div class="col-lg-10">
                                                            <input type="file" class="form-control" id="example-fileinput" name="image">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label" for="simpleinput">Website</label>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control" id="simpleinput" name="website">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label" for="simpleinput">Địa chỉ</label>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control" id="simpleinput" name="address">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label">Vị trí</label>
                                                        <div class="col-lg-10">
                                                            <input type="number" class="form-control" name="position">
                                                        </div>
                                                    </div>
                                                    <div class="custom-control custom-switch mb-2">
                                                        <input type="checkbox" class="custom-control-input" id="customSwitch1"  name="is_active" value="1">
                                                        <label class="custom-control-label" for="customSwitch1">Trạng thái</label>
                                                    </div>
                                                     <button type="submit" class="btn btn-primary">Thêm</button>
                                               </div>

                                           </div>
                                        </form>
            
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div><!-- end col -->
            </div>
@endsection