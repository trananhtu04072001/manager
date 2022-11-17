@extends('layout.layout')
@section('title','Lịch sử Vào điểm')
@section('content')
@if (session('success'))
<div class="alert alert-success">
      <p>{{ session('success') }}</p>
</div>
@endif
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Vào điểm lần 1 Lớp {{$schedule->room->name}}</h3>
    </div>
    <!-- /.card-header -->
    <form method="POST">
        @csrf
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Mã SV</th>
          <th>Lớp</th>
          <th>Họ và tên</th>
          <th>Điểm lần 1</th>
          <th>Điểm lần 2</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($point as $item)
        <tr>
          <td>{{$item->id}}</td>
          <td>{{$item->student->student_code}}</td>
          <td>{{$item->room->name}}</td>
          <td>{{$item->student->name}}</td>
          <td>
            <input type="text" value="{{$item->point_one}}" name="point_one[]">
          </td>
          <td>
            <input type="text" value="{{$item->point_two}}" name="point_two[]">
            {{-- <input type="hidden" name="student_id[]" value="{{$item->student_id}}"> --}}
          </td>
        </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <div class="form-group">
        <label>Giáo viên điểm danh</label>
        <select class="form-control" name="admin_id">
            <option value="{{$schedule->admin_id}}">{{$schedule->admin->name}}</option>
        </select>
      </div>
      <br>
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Miêu tả (Bắt buộc)
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <textarea id="summernote" name="description">
              </textarea>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <input type="hidden" name="subject_id" value="{{$schedule->subject->id}}">
      <input type="hidden" name="room_id" value="{{$schedule->room->id}}">
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Lưu</button>
      </div>
    </form>
    <!-- /.card-body -->
  </div>
@endsection
@section('js')
<script>
     $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
</script>
<script>
    $(function () {
      // Summernote
      $('#summernote').summernote()
  
      // CodeMirror
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
      });
    })
  </script>
@stop