@extends('layout.layout')
@section('title','Thêm lịch thi')
@section('content')
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
  </ul>
</div>
@endif
@if (session('success'))
<div class="alert alert-success">
      <p>{{ session('success') }}</p>
</div>
@endif
<div class="col-md-12">
    <!-- jquery validation -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Thêm lịch thi</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="POST">
        @csrf
        <div class="card-body">
        <div class="form-group">
            <label>Giảng viên coi thi</label>
            <select class="form-control" name="admin_id">
                @foreach ($teacher as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Lớp</label>
            <select class="form-control" name="room_id" id="room_id">
                @foreach ($subject as $item)
                <option value="{{$item->room->id}}">{{$item->room->name}}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Môn học</label>
            <select class="form-control" name="subject_id">
                <option value="" id="subject_id"></option>
            </select>
          </div>
          <div class="form-group">
            <label>Bắt đầu</label>
              <div class="input-group date" id="reservationdatetime">
                  <input name="start" type="datetime-local" class="form-control datetimepicker-input" data-target="#reservationdatetime"/>
                  <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
              </div>
          </div>
          <div class="form-group">
            <label>Kết thúc</label>
              <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                  <input name="end" type="datetime-local" class="form-control datetimepicker-input" data-target="#reservationdatetime"/>
                  <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
              </div>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Thêm</button>
        </div>
      </form>
    </div>
    <!-- /.card -->
    </div>
@endsection
@section('js')
<script type="text/javascript">
    $(function () {
      $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });
    })


    var subject = @json($subject);
    $('#room_id').on('change', function() {
        var room = $('#room_id').val();
      subject.forEach(function(item,index){
        if (room == item.room_id) {
            $('#subject_id').val(item.subject.id);
            $('#subject_id').text(item.subject.name);
            console.log(item.subject.name);
        }
      });
    })
</script>
@stop