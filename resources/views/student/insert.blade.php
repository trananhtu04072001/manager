@extends('layout.layout')
@section('title','Thêm sinh viên')
@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (session('success'))
<div class="alert alert-success">
      <p>{{ session('success') }}</p>
</div>
@endif
<div class="col-md-12">
    <!-- jquery validation -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Thêm sinh viên</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="POST">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Mã sinh viên</label>
            <input type="text" name="student_code" class="form-control" placeholder="Mã sinh viên:">
          </div>
        </div>
        <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Họ và tên</label>
              <input type="text" name="name" class="form-control" placeholder="Họ và tên:">
            </div>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="text" name="email" class="form-control" placeholder="Email:">
            </div>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Số điện thoại</label>
              <input type="text" name="phone" class="form-control" placeholder="Số điện thoại:">
            </div>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Địa chỉ</label>
              <input type="text" name="address" class="form-control" placeholder="Địa chỉ:">
            </div>
          </div>
          <div class="card-body">
          <div class="form-group">
            <label>Khoá</label>
            <select class="form-control" name="course_id">
                @foreach ($course as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
          </div>
          </div>
          <div class="card-body">
          <div class="form-group">
            <label>Lớp</label>
            <select class="form-control" name="room_id">
                @foreach ($room as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
          </div>
          </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Thêm</button>
        </div>
      </form>
    </div>
    <!-- /.card -->
    </div>
@endsection