@extends('layout.layout')
@section('title','Lịch sử điểm thi')
@section('content')
@if (session('success'))
<div class="alert alert-success">
      <p>{{ session('success') }}</p>
</div>
@endif
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Lịch thi</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>ID</th>
          <th>Giảng viên</th>
          <th>Môn học</th>
          <th>Lớp học</th>
          <th>Giờ bắt đầu</th>
          <th>Giờ kết thúc</th>
          <th>Trạng thái</th>
          <th>Lịch sử</th>
          <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($schedule as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->admin->name}}</td>
                    <td>{{$item->subject->name}}</td>
                    <td>{{$item->room->name}}</td>
                    <td>{{$item->start}}</td>
                    <td>{{$item->end}}</td>
                    <td>
                      @if ($item->status == 2)
                      <h6 class="link-success">Đã thi xong</h6>
                      @endif
                    </td>
                    <td>
                      @if ($item->status == 2)
                      <a href="{{route('historyExam.detail',$item->id)}}" class="btn btn-primary">Xem lại</a>
                      @endif
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