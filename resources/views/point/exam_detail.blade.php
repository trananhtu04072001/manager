@extends('layout.layout')
@section('title','Điểm môn học')
@section('content')
@if (session('success'))
<div class="alert alert-success">
      <p>{{ session('success') }}</p>
</div>
@endif
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Điểm môn học</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>ID</th>
          <th>Lớp học</th>
          <th>Môn học</th>
          <th>Học viên</th>
          <th>Điểm lần 1</th>
          <th>Điểm lần 2</th>
          <th>Trạng thái</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($point as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->room->name}}</td>
                    <td>{{$item->subject->name}}</td>
                    <td>{{$item->student->name}}</td>
                    <td>{{$item->point_one}}</td>
                    <td>{{$item->point_two}}</td>
                    <td>
                      @if($item->status == 1)
                      <h6 class="link-success">Qua môn</h6>
                      @endif
                      @if ($item->status == 0)
                      <h6 class="link-danger">Học lại</h6>  
                      @endif
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