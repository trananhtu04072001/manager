@extends('layout.layout')
@section('title','Lương cơ bản giảng viên')
@section('content')
<br>
<a href="{{route('salary.insert')}}" type="button" class="btn btn-primary float-left pL-50"><i class="fas fa-plus"></i> Thêm Lương cơ bản</a>
<br><br>
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Lương cơ bản giảng viên</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>ID</th>
          <th>Giảng viên</th>
          <th>Lương</th>
          <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($salary as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->admin->name}}</td>
                    <td>{{number_format($item->salary, 0, ',', '.')}} VND</td>
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