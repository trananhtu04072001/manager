@extends('layout.layout')
@section('title','Lịch sử Điểm danh')
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Điểm danh Lớp {{$schedule->room->name}}</h3>
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
          <th>Lí do</th>
          <th>Trạng thái</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($attendance_detail as $item)
        <tr>
          <td>{{$item->id}}</td>
          <td>{{$item->student->student_code}}</td>
          <td>{{$item->student->room_id}}</td>
          <td>{{$item->student->name}}</td>
          <td>
            <input type="text" name="des[]" value="{{$item->des}}">
          </td>
          <td>
            <select name="" id="">
                @if ($item->status_learn == 0)
                <option value="" selected>Nghỉ học</option>
                @endif
                @if ($item->status_learn == 2)
                <option value="" selected>Có phép</option>
                @endif
                @if ($item->status_learn == 1)
                <option value="" selected>Đi học</option>
                @endif
            </select>
            <input type="hidden" name="student_id[]" value="">
          </td>
        </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <div class="form-group">
        <label>Môn học: {{$schedule->subject->name}} <span>- Số giờ: {{$schedule->subject->hour}} giờ</span></label>
        <select class="form-control" name="session">
            <option value="">{{$attendance[0]->session}}</option>
        </select>
      </div>
    <div class="form-group">
        <label>Giáo viên điểm danh</label>
        <select class="form-control" name="admin_id">
            <option value="">{{$attendance[0]->admin->name}}</option>
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
                {{$attendance[0]->description}}
              </textarea>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <input type="hidden" name="schedule_id" value="{{$schedule->id}}">
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