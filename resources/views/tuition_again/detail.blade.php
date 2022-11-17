@extends('layout.layout')
@section('title','Phí học lại học viên')
@section('content')
@if (session('success'))
<div class="alert alert-success">
      <p>{{ session('success') }}</p>
</div>
@endif
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Phí học lại học viên</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>ID</th>
          <th>Học viên</th>
          <th>Môn học</th>
          <th>Học phí</th>  
          <th>Trạng thái</th>
          <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($detail as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->student->name}}</td>
                    <td>{{$item->tuition_again->subject->name}}</td>
                    <td>{{number_format($item->tuition_again->tuition, 0, ',', '.')}} VND</td>
                    <td>
                        @if ($item->status == 1)
                        <h6 class="link-success">Đã đóng</h6>
                        @endif
                        @if($item->status == 0)
                        <h6 class="link-danger">Chưa thanh toán</h6>  
                        @endif
                    </td>
                    <td>
                      @if($item->status == 0)
                        <a href="{{route('again_detail.update',$item->id)}}" class="btn btn-primary">Cập nhật</a>
                        @endif
                        @if($item->status == 1)
                        <h6 class="link-danger">Đã đóng</h6>  
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