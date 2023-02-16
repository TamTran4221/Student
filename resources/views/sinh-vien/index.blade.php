@extends('master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Họ và tên sinh viên</th>
                        <th>Hình ảnh</th>
                        <th>Quê quán</th>
                        <th>Giới tính</th>
                        <th>Lớp học</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students  as $value)
                    <tr>
                        <td scope="row">{{$loop->iteration}}</td>
                        <td>{{$value->ho_va_ten}}</td>
                        <td><img src="{{url('uploads')}}/{{$value->hinh_anh}}" alt="" width="100px"></td>
                        <td>{{$value->que_quan}}</td>
                        <td>{{$value->gio_tinh ? 'Nam' : 'Nữ'}}</td>
                        <td>{{$value->lop_hoc_id}}</td>
                        <td>
                            <a href="{{route('sinh-vien.edit',$value)}}" class="btn btn-primary">Sửa</a>

                            <form action="{{route('sinh-vien.destroy',$value)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                   @endforeach
                </tbody>
            </table>
            <a href="{{route('sinh-vien.create')}}" class="btn btn-success">Thêm mới</a>
        </div>
    </div>
</div>
@endsection