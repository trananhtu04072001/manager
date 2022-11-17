@extends('layout.layout')
@section('title','Thêm chương trình học')
@section('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
@stop
@section('content')
<div class="col-md-12">
    <!-- jquery validation -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Thêm chương trình học</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method="POST">
        @csrf
        <div class="form-group">
            <label>Kì học</label>
            <select class="form-control" name="semmester_id">
                @foreach ($semmester as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Chuyên ngành</label>
            <select class="form-control" name="majors_id">
                @foreach ($major as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
          </div>
          {{-- <div class="form-group">
            <label>Môn học</label>
            <select class="form-control" name="subject_id">
                @foreach ($subject as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
          </div> --}}

          <div class="row d-flex justify-content-center mt-100">
            <label>Môn học</label>
            <div class="col-md-6"> 
              <select name="subject_id[]" id="choices-multiple-remove-button" placeholder="Chọn môn học" multiple>
              @foreach ($subject as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
                </select> 
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
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<script>
  $(document).ready(function(){
    
    var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
       removeItemButton: true,
       maxItemCount:100,
       searchResultLimit:100,
       renderChoiceLimit:100
     }); 
});
</script>
@stop