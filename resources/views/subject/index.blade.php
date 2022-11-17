@extends('layout.layout')
@section('title','Quản lí môn học')
@section('content')
@if (session('success'))
<div class="alert alert-success">
      <p>{{ session('success') }}</p>
</div>
@endif
<br>
<a href="{{route('subject.add')}}" type="button" class="btn btn-primary float-left pL-50"><i class="fas fa-plus"></i> Thêm môn học</a>
<br><br>
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Quản lí môn học</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>ID</th>
          <th>Môn học</th>
          <th>Giờ học</th>
          <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($subject as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->hour}} giờ</td>
                    <td>
                        <a href="{{route('subject.delete',$item->id)}}" class="btn btn-primary">Xoá</a>
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