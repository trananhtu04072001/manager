@extends('layout.layout')
@section('title','Học phí ngành học')
@section('content')
@if (session('success'))
<div class="alert alert-success">
      <p>{{ session('success') }}</p>
</div>
@endif
<br>
<a href="{{route('get.tuition.index')}}" type="button" class="btn btn-primary float-left pL-50"><i class="fas fa-plus"></i> Thêm học phí ngành học</a>
<br><br>
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Học phí ngành học</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>ID</th>
          <th>Khoá học</th>
          <th>Ngành học</th>  
          <th>Học phí</th>  
          <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($tuition_course as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->course->name}}</td>
                    <td>{{$item->major->name}}</td>
                    <td>{{number_format($item->tuition, 0, ',', '.')}} VND</td>
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