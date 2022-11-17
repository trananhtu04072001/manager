@extends('layout.layout')
@section('title','Học phí sinh viên')
@section('content')
@if (session('success'))
<div class="alert alert-success">
      <p>{{ session('success') }}</p>
</div>
@endif
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Học phí sinh viên</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Tiêu đề</th>
          <th>Mã SV</th>
          <th>Họ và tên</th>
          <th>Học phí 1 đợt</th>
          <th>Học phí đóng</th>
          <th>Học phí còn lại</th>
          <th>Đã đóng đến</th>
          <th>Trạng thái</th>
          <th>Thao tác</th>
          <th>Cập nhật</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($detail as $item)
        <tr>
          <td>{{$item->id}}</td>
          <td>{{$item->title}}</td>
          <td>{{$item->student->student_code}}</td>
          <td>{{$item->student->name}}</td>
          <td>{{number_format($item->tuition->tuition, 0, ',', '.')}} VND</td>
          <td>{{number_format($item->payment, 0, ',', '.')}} VND</td>
          <td>{{number_format($item->total, 0, ',', '.')}} VND</td>
          <td>Đợt {{$item->count}}</td>
          <td>
            @if ($item->status == 0) 
            <h6 class="link-danger">chưa thanh toán</h6>
            @endif
            @if ($item->status == 1)
            <h6 class="link-success">Đã thanh toán</h6>
            @endif
            @if ($item->status == 2)
            <h6 class="link-success">Hoàn thành</h6>
            @endif
          </td>
          <td>
            @if ($item->status == 0)
            <a href="{{route('tuition.update',$item->id)}}" class="btn btn-primary">Cập nhật</a>
            @endif
            @if ($item->status == 1)
            <h6 class="link-success">Đã thanh toán</h6>
            @endif
          </td>
          <td>
            @if ($item->status == 0)
            <a href="{{route('update.getTuition',$item->id)}}" class="btn btn-primary">Đóng nhiều đợt</a>
            @endif
            @if ($item->status == 1)
            <h6 class="link-success">không thể sửa</h6>
            @endif
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
<script>
    $(function () {
      // Summernote
      $('#summernote').summernote()
  
      // CodeMirror
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
      });
    })
  </script>
@stop