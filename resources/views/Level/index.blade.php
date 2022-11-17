@extends('layout.layout')
@section('title','Phòng ban')
@section('content')
<br>
<a href="{{route('level.add')}}" type="button" class="btn btn-primary float-left pL-50"><i class="fas fa-plus"></i> Thêm phòng ban</a>
<br><br>
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Phòng ban</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>ID</th>
          <th>Phòng ban</th>
          <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($level as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>
                        <a href="{{route('level.delete',$item->id)}}" class="btn btn-primary">Xoá</a>
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