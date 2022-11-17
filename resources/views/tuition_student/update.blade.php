@extends('layout.layout')
@section('title','Đóng nhiều đợt')
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
        <h3 class="card-title">Đóng nhiều đợt</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="POST">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Học phí 1 đợt: {{number_format($tuition->tuition->tuition, 0, ',', '.')}} VND</label>
            <br>
            <label for="exampleInputEmail1">Học phí Đóng</label>
            <input type="text" name="payment" class="form-control" placeholder="Học phí đóng:">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Đợt thứ </label>
            <label for="exampleInputEmail1">|| Đã đóng đến đợt: {{$tuition->count}}</label>
            <input type="text" name="count" class="form-control" placeholder="Học phí đợt:">
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