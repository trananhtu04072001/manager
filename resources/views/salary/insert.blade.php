@extends('layout.layout')
@section('title','Thêm Lương giảng viên')
@section('content')
<div class="col-md-12">
    <!-- jquery validation -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Thêm lương giảng viên</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="POST">
        @csrf
     <div class="card-body">
        <div class="form-group">
            <label>Giảng viên</label>
            <select class="form-control" name="admin_id">
                @foreach ($admin as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
          </div>
        </div>
        <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Lương thoả thuận</label>
              <input type="text" name="salary" class="form-control" placeholder="Lương thoả thuận:">
            </div>
          </div
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Thêm</button>
        </div>
      </form>
    </div>
    <!-- /.card -->
    </div>
@endsection