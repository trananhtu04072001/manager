@extends('layout.layout')
@section('title','Thông báo đã đọc')
@section('content')
@if (session('success'))
<div class="alert alert-success">
      <p>{{ session('success') }}</p>
</div>
@endif
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Thông báo</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>ID</th>
          <th>Tiêu đề</th>
          <th>Môn học</th>
          <th>Lớp học</th>
          <th>Thời gian</th>
          <th>Đã đọc lúc</th>
          <th>Trạng thái</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($exam_schedule as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->subject->name}}</td>
                    <td>{{$item->room->name}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->read_at}}</td>
                    <td>
                      @if($item->read_at == null)
                      <h6 class="link-warning">Chưa đọc</h6>
                      @else
                      <h6 class="link-success">Đã đọc</h6>
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