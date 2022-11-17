@extends('layout.layout')
@section('title','Lịch học lại')
@section('content')
@if (session('success'))
<div class="alert alert-success">
      <p>{{ session('success') }}</p>
</div>
@endif
<br>
<a href="{{route('schedule_again.get')}}" type="button" class="btn btn-primary float-left pL-50"><i class="fas fa-plus"></i> Thêm lịch học</a>
<br><br>
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Lịch học lại</h3>
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
          <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($schedule as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->admin->name}}</td>
                    <td>{{$item->subject->name}}</td>
                    <td>{{$item->room}}</td>
                    <td>{{$item->start}}</td>
                    <td>{{$item->end}}</td>
                    <td>
                      @if ($item->status == 1)
                      <h6 class="link-success">Chưa đến giờ</h6>
                      @endif
                      @if($item->status == 0)
                      <h6 class="link-danger">Quá thời gian</h6>  
                      @endif
                      @if($item->status == -1)
                      <h6 class="link-danger">Vừa cập nhật</h6>  
                      @endif
                    </td>
                    <td>
                        <a href="" class="btn btn-primary">Xoá</a>
                        <a href="" class="btn btn-primary">Sửa</a>
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