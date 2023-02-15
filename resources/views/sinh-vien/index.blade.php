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
                    @foreach($students  as $data)
                    <tr>
                        <td scope="row">{{$loop->iteration}}</td>
                        <td>{{$data->ho_va_ten}}</td>
                        <td>{{$data->que_quan}}</td>
                        <td>{{$data->gioi_tinh }}</td>
                        <td>{{$data->lop_hoc_id}}</td>
                        <td>
                            <a href="{{route('sinh-vien.edit',$data)}}" class="btn btn-primary">Sửa</a>

                            <form action="{{route('sinh-vien.destroy',$data)}}" method="POST">
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