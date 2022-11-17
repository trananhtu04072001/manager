@extends('layout.layout')
@section('title','Thêm chuyên ngành')
@section('content')
<div class="col-md-12">
    <!-- jquery validation -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Thêm chuyên ngành</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="POST">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Ngành học</label>
            <input type="text" name="name" class="form-control" placeholder="Ngành học:">
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