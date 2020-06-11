@extends('admin.layout.main')
@section('content')
<div class="row page-title">
                            <div class="col-md-12">
                                <div aria-label="breadcrumb" class="float-right mt-1">
                                    <a class="btn btn-primary" href="{{route('admin.category.index')}}">Danh sách</a>
                                </div>
                                <h4 class="mb-1 mt-0">Thêm mới</h4>
                            </div>
</div>
            <div class="row">
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mt-0">Thêm mới Category</h4>
                                        <form class="form-horizontal" form role="form" action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                           <div class="row">
                                               <div class="col">
                                                    <div class="form-group row">
                                            <select class="custom-select mb-2" name="parent_id">
                                            <option selected="" value="0">Danh mục cha</option>
                                        @foreach ($data as $item)
                                            <option value="{{$item->id}}">{{  $item->name }}</option>
                                            @if(count($item->subcategory))
                                            @foreach($item->subcategory as $subcategory)
                                            <option value="{{$subcategory->id}}"> -- {{$subcategory->name}}</option> 
                                            @if(count($subcategory->subcategory))
                                            @foreach($subcategory->subcategory as $subcategory)
                                            <option value="{{$subcategory->id}}"> --- {{$subcategory->name}}</option>
                                            @endforeach
                                            @endif
                                            @endforeach
                                            @endif
                                         @endforeach
                                            </select>
                                            
                                                   </div>
                                                   <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label" for="simpleinput">Tên</label>
                                                        <div class="col-lg-10">
                                                            <input type="text" class="form-control" id="simpleinput" name="name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label" for="example-fileinput">Ảnh</label>
                                                        <div class="col-lg-10">
                                                            <input type="file" class="form-control" id="example-fileinput" name="image">
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
                                                     <button type="submit" class="btn btn-primary">Submit</button>
                                               </div>

                                           </div>
                                        </form>
            
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div><!-- end col -->
            </div>
@endsection

