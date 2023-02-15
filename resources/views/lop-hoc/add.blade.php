@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <form method="POST" action="{{route('lop-hoc.store')}}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên lớp học</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="ten_lop">
                    
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Trạng thái</label>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="trang_thai" id="" value="0"> Ẩn
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="trang_thai" id="" value="1" checked> Hiện
                        </label>
                    </div>
                </div>
              
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection