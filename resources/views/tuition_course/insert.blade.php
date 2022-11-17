@extends('layout.layout')
@section('title','Thêm học phí ngành học')
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
        <h3 class="card-title">Thêm học phí ngành học</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="POST">
        @csrf
        <div class="card-body">
        <div class="form-group">
            <label>Khoá học</label>
            <select class="form-control" name="course_id">
                @foreach ($course as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Ngành học</label>
            <select class="form-control" name="major_id" id="major_id">
                @foreach ($major as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Học phí 1 đợt</label>
            <input type="text" name="tuition" class="form-control" placeholder="Học phí 1 đợt:">
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
{{-- @section('js')
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
@stop --}}