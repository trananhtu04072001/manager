@extends('layout.layout')
@section('title','Thêm môn học')
@section('content')
<div class="col-md-12">
    <!-- jquery validation -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Thêm môn học</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="POST">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Môn học</label>
            <input type="text" name="name" class="form-control" placeholder="Môn học:">
          </div>
        </div>
        <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Số giờ học</label>
              <input type="text" name="hour_learn" class="form-control" placeholder="Số giờ học:">
            </div>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Tổng giờ học</label>
              <input type="text" name="hour" class="form-control" placeholder="Tổng giờ học:">
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