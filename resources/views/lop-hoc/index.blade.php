@extends('master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên Lớp</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lop_hocs as $data)
                    <tr>
                        <td scope="row">{{$loop->iteration}}</td>
                        <td>{{$data->ten_lop}}</td>
                        <td>{{$data->trang_thai}}</td>
                        <td>
                            <a href="{{route('lop-hoc.edit',$data)}}" class="btn btn-primary">Sửa</a>

                            <form action="{{route('lop-hoc.destroy',$data)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                   @endforeach
                </tbody>
            </table>
            <a href="{{route('lop-hoc.create')}}" class="btn btn-success">Thêm mới</a>
        </div>
    </div>
</div>
@endsection