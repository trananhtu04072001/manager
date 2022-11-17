@extends('layout.layout')
@section('title','Danh sách sinh viên')
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Danh sách sinh viên lớp</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Mã SV</th>
          <th>Họ và tên</th>
          <th>Email</th>
          <th>Số điện thoại</th>
          <th>Địa chỉ</th>
          <th>Lớp</th>
          <th>Trạng thái</th>
          <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($student as $item)
        <tr>
          <td>{{$item->id}}</td>
          <td>{{$item->student_code}}</td>
          <td>{{$item->name}}</td>
          <td>{{$item->email}}</td>
          <td>{{$item->phone}}</td>
          <td>{{$item->address}}</td>
          <td>{{$item->room->name}}</td>
          <td>
            @if ($item->status == 1)
            <h6 class="link-success">Đang theo học</h6>
            @else
            <h6 class="link-danger">Đã nghỉ học</h6>
            @endif
          </td>
          <td>
            <a href="{{route('student.status',$item->id)}}" class="btn btn-primary">Cập nhật</a>
        </td>         
        </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
@section('js')
<script>
     $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
</script>
@stop