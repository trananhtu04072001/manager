@extends('layout.layout')
@section('title','Quản lí chuyên ngành')
@section('content')
@if (session('success'))
<div class="alert alert-success">
      <p>{{ session('success') }}</p>
</div>
@endif
<br>
<a href="{{route('major.add')}}" type="button" class="btn btn-primary float-left pL-50"><i class="fas fa-plus"></i> Thêm chuyên ngành</a>
<br><br>
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Quản lí chuyên ngành</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>ID</th>
          <th>Chuyên ngành</th>
          <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($major as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>
                        <a href="{{route('major.delete',$item->id)}}" class="btn btn-primary">Xoá</a>
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