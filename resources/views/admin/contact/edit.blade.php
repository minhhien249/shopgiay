@extends('admin.layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            <i class="fa fa-file-text-o" aria-hidden="true"></i> Chi Tiết Phản Hồi
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="box box-primary">
                    <form action="{{ route('admin.contact.update', ['id' => $contact->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td><label for="">Tên khách hàng :</label></td>
                                    <td>{{ $contact->name }}</td>
                                    <td><label>Email:</label></td>
                                    <td>{{ $contact->email }}</td>
                                </tr>
                                <tr>
                                    <td><label>Trạng thái phản hồi</label></td>
                                    <td style="color: red">
                                        <select class="form-control " name="contact_status_id" style="max-width: 150px;display: inline-block;">
                                            <option value="0">-- chọn --</option>
                                            @foreach($contact_status as $status)
                                                <option {{ ($contact->contact_status_id == $status->id ? 'selected':'') }} value="{{ $status->id }}">{{ $status->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Chi tiết :</label> </td>
                                    <td colspan="3">
                                        <div class="form-group">
                                            {{$contact->content }}
                                        </div>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="box-header with-border">
                            <button type="submit" class="btn btn-info btn-flat">
                                <i class="fa fa-edit"></i>
                                Cập nhật
                            </button>
                        </div>
                    </form>
                </div>
                    </div>
                </div>
                <!-- /.box -->


            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
@endsection
