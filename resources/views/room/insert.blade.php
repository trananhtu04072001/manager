@extends('layout.layout')
@section('title','Thêm lớp học')
@section('content')
<div class="col-md-12">
    <!-- jquery validation -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Thêm lớp học</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="POST">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Lớp học</label>
            <input type="text" name="name" class="form-control" placeholder="Lớp học:">
          </div>
        </div>
        <div class="form-group">
            <label>Khoá</label>
            <select class="form-control" name="course_id">
                @foreach ($course as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Chuyên ngành</label>
            <select class="form-control" name="major_id">
                @foreach ($major as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
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