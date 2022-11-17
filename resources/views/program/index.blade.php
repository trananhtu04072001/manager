@extends('layout.layout')
@section('title','Chương trình học')
@section('content')
@if (session('success'))
<div class="alert alert-success">
      <p>{{ session('success') }}</p>
</div>
@endif
<br>
<a href="{{route('semmester.get')}}" type="button" class="btn btn-primary float-left pL-50"><i class="fas fa-plus"></i> Thêm kì học</a>
<a href="{{route('program.add')}}" type="button" class="btn btn-primary float-left pL-50"><i class="fas fa-plus"></i> Thêm chương trình học</a>
<br><br>
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Quản lí chương trình học</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>ID</th>
          <th>Kì học</th>
          <th>Chuyên ngành</th>
          <th>Môn học</th>
          <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($program as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->semmester->name}}</td>
                    <td>{{$item->majors->name}}</td>
                    <td>{{$item->subject->name}}</td>
                    <td>
                        <a href="{{route('program.delete',$item->id)}}" class="btn btn-primary">Xoá</a>
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