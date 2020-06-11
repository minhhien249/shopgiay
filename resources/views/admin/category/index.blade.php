@extends('admin.layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            Danh Sách Danh Mục <a href="{{route('admin.category.create')}}" class="btn btn-info pull-right ml-5"><i class="fa fa-plus"></i> Thêm Danh Mục</a>
        </h1>
    </section>
    <section class="content">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Tên Danh Mục</th>
                                        <th scope="col">Hình Ảnh</th>
                                        <th scope="col">Danh Mục Cha</th>
                                        <th scope="col">Trạng Thái</th>
                                        <th scope="col ml-3 text-center">Hành Động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr class="item-{{ $item->id }}">
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                                <td>
                                                    @if ($item->image)
                                                        <img src="{{asset($item->image)}}" width="50" height="50">
                                                    @endif
                                                </td>
                                                <td>{{ $item->parent['name'] ?$item->parent['name'] :'trống' }}</td>
                                                <td>{{ $item->is_active }}</td>
                                                <td class="text-center">
                                                    <a href="{{route('admin.category.show', ['id'=> $item->id ])}}" class="btn btn-warning">Xem</a>
                                                    <a href="{{route('admin.category.edit', ['id'=> $item->id])}}" class="btn btn-info">Sửa</a>
                                                    <a type="javascript:void(0)" class="btn btn-danger" onclick="delete_model({{ $item->id }},'category')" >Xóa</a>
                                                </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="box-footer clearfix">
                            <ul class="pagination pagination-sm no-margin">
                                {{ $data->links() }} {{-- nút bấm phân trang --}}
                            </ul>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!-- /.row -->
    </section>
@endsection
