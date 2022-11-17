@extends('layout.layout')
@section('title','Lương giảng viên')
@section('content')
<br>
<a href="{{route('salary.insert')}}" type="button" class="btn btn-primary float-left pL-50"><i class="fas fa-plus"></i> Thêm Lương cơ bản</a>
<br><br>
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Lương giảng viên</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>ID</th>
          <th>Tháng</th>
          <th>Giảng viên</th>
          <th>Lương</th>
          <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($detail as $item)
                <tr>
                    <td>{{$item->salary->id}}</td>
                    <td>Tháng {{$item->month}}</td>
                    <td>{{$item->salary->admin->name}}</td>
                    <td>{{number_format($item->salary->salary + $item->salary_bonus, 0, ',', '.')}} VND</td>
                    <td>
                        <a href="" class="btn btn-primary">sửa</a>
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