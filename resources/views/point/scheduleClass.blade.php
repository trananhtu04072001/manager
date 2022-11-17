@extends('layout.layout')
@section('title','Môn đã kết thúc')
@section('content')
@if (session('success'))
<div class="alert alert-success">
      <p>{{ session('success') }}</p>
</div>
@endif
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Môn đã kết thúc</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>ID</th>
          <th>Lớp học</th>
          <th>Môn học</th>
          <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($schedule_exam as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->room->name}}</td>
                    <td>{{$item->subject->name}}</td>
                    <td>
                        <a href="{{route('point.class_Exam_detail',$item->id)}}" class="btn btn-primary">Điểm</a>
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