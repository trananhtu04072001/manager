@extends('layout.layout')
@section('title','Quản lí Lớp học')
@section('content')
@if (session('success'))
<div class="alert alert-success">
      <p>{{ session('success') }}</p>
</div>
@endif
<br>
<a href="{{route('room.add')}}" type="button" class="btn btn-primary float-left pL-50"><i class="fas fa-plus"></i> Thêm lớp học</a>
<a href="{{route('student.add')}}" type="button" class="btn btn-primary float-left pL-50"><i class="fas fa-plus"></i> Thêm học viên</a>
<br><br>
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Quản lí lớp học</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>ID</th>
          <th>Lớp</th>
          <th>Chuyên ngành</th>
          <th>Khoá học</th>
          <th>Sinh viên</th>
          <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($room as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->course->name}}</td>
                    <td>{{$item->major->name}}</td>
                    <td>
                      <a href="{{route('student.index',$item->id)}}" class="btn btn-primary">Danh sách</a>
                    </td>
                    <td>
                        <a href="" class="btn btn-primary">Xoá</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
@section('js')
<script>
     $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@stop