@extends('admin.layout.main')
@section('content')
<div class="row">
    <div class="col-12 ">
        <h1 class="text-dark">Menu phân cấp</h1>
<!-- Contenedor -->
<ul id="accordion" class="accordion">
  @foreach ($data as $item)
  <li class="item-{{$item->id}}">
    <div class="link  d-flex align-items-center justify-content-between">{{  $item->name }} 
        <div>
    <a class="btn btn-success" href="{{route('admin.category.show', ['id'=> $item->id ])}}">Xem</a>
    <a class="btn btn-primary" href="{{route('admin.category.edit', ['id'=> $item->id ])}}">Sửa</a>
    <a class="btn btn-danger" href="javascript:void(0)" onclick="delete_model({{$item->id}},'category')">Xóa</a>
    </div>
    </div>
    @if(count($item->subcategory))
        @foreach($item->subcategory as $subcategory)
    <ul class="submenu">
      <li class="item-{{$subcategory->id}}">
        <div class="link item-{{$subcategory->id}}  d-flex align-items-center justify-content-between">{{  $subcategory->name }}
        <div>
            <a class="btn btn-success" href="{{route('admin.category.show', ['id'=> $subcategory->id ])}}">Xem</a>
            <a class="btn btn-primary" href="{{route('admin.category.edit', ['id'=> $subcategory->id ])}}">Sửa</a>
            <a class="btn btn-danger" href="javascript:void(0)" onclick="delete_model({{$subcategory->id}},'category')">Xóa</a>
        </div>
        </div>
        @if(count($subcategory->subcategory))
            @foreach($subcategory->subcategory as $subcategory)
        <ul>
            <li class="item-{{$subcategory->id}}">
                <div class="link  d-flex align-items-center justify-content-between">
                {{  $subcategory->name }}
                <div>
            <a class="btn btn-success" href="{{route('admin.category.show', ['id'=> $subcategory->id ])}}">Xem</a>
            <a class="btn btn-primary" href="{{route('admin.category.edit', ['id'=> $subcategory->id ])}}">Sửa</a>
            <a class="btn btn-danger" href="javascript:void(0)" onclick="delete_model({{$subcategory->id}},'category')">Xóa</a>
                </div>
                </div>
            </li>
        </ul>
            @endforeach
        @endif
      </li>
    </ul>
        @endforeach
    @endif
  </li>
  @endforeach
  <li><a class="btn btn-primary w-100" href="{{route('admin.category.create')}}">Thêm mới +</a></li>
</ul>
    </div>
</div>
@endsection