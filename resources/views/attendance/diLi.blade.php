@extends('layout.layout')
@section('title','Chuyên cần')
@section('content')
<div class="card">
    <div class="card-header">
        @foreach ($detail as $item)
        @endforeach
      <h3 class="card-title">Điểm chuyên cần môn: {{$item->subject->name}} - Lớp: {{$item->room->name}}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <form method="post" id="form1">
        @csrf
         <button id="btn_one" type="submit" class="btn btn-primary" form="form1">Cập nhật</button>
      </form>
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>ID</th>
          <th>Học viên</th>
          <th>Chuyên cần</th>
          <th>Trạnh thái</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($detail as $item)
                <tr>
                    <td>{{$item->student->id}}</td>
                    <td>{{$item->student->name}}</td>
                    <td class="status">
                      {{$item->sum}}/{{($item->subject->hour)/($item->subject->hour_learn)}}
                      <input type="hidden" name="{{$item->student->id}}" value="{{$item->student->id}}">
                      {{-- <td id="{{$item->student->id}}"><span id="{{$item->student->id}}"></span> --}}
                        @if ($item->sum < ($item->subject->hour)/($item->subject->hour_learn)*5/100)
                        <td style="background-color: skyblue">
                        Đủ điều kiện thi
                        @endif
                        </td>
                      @if ($item->sum >= ($item->subject->hour)/($item->subject->hour_learn)*5/100 && $item->sum < ($item->subject->hour)/($item->subject->hour_learn)*10/100)
                      <td style="background-color: orange">
                        Cần chú ý đi học đầy đủ
                      </td>
                      @endif
                      @if ($item->sum >= ($item->subject->hour)/($item->subject->hour_learn)*10/100)
                      <td style="background-color: red">
                      Cấm thi lần 1
                      </td>
                    @endif
                      {{-- </td> --}}
                      {{-- form --}}
                      <input type="hidden" name="subject_id" value="{{$item->subject->id}}" form="form1">
                      <input type="hidden" name="room_id" value="{{$item->room->id}}" form="form1">
                      <input type="hidden" name="student_id[]" value="{{$item->student->id}}" form="form1">
                      <input type="hidden" name="sum[]" value="{{$item->sum}}" form="form1">
                      <input type="hidden" name="learn" value="{{($item->subject->hour)/($item->subject->hour_learn)}}" form="form1">
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
<script>
  var count = @json($count);
  let data = @json($detail);
  var status = @json($status);
   $(function () { 
    // var sum = $('input[name=sum]').val();
    // Array(data).forEach(function(item,index){
    //     for(var i = 0 ; i < count ; i++) {
    //       console.log(count);
    //       // console.log(i);
    //       console.log(item);
    //     var student = $('input[name=' + item[i].student.id + ']').val();
    //     var hour = item[i].subject.hour;
    //     var hour_learn = item[i].subject.hour_learn;
    //     var percent = (hour)/(hour_learn)*10/100;
    //     var percent_two = (hour)/(hour_learn)*5/100;
    //     if(item[i].student.id == student) {
    //       if(item[i].sum >= percent_two && item[i].sum < percent) {
    //         $('#' + item[i].student.id +'').text('Để ý học đầy đủ');
    //         $('#' + item[i].student.id +'').css('color','black');
    //         $('#' + item[i].student.id +'').css('background-color','orange');
    //       }
    //       if(item[i].sum >= percent) {
    //         $('#' + item[i].student.id +'').text('Cấp thi lần 1');
    //         $('#' + item[i].student.id +'').css('color','back');
    //         $('#' + item[i].student.id +'').css('background-color','red');
    //       }
    //       if(item[i].sum < percent_two) {
    //         $('#' + item[i].student.id +'').text('Đủ điều kiện thi');
    //         $('#' + item[i].student.id +'').css('color','black');
    //         $('#' + item[i].student.id +'').css('background-color','skyblue');
    //       }
    //     }
    //   } 
    // });
    $('#btn_one').css('display','none');
    if(status.length > 0){
    $('#btn_one').css('display','block');
    alert('Vui lòng cập nhật,môn học đã học xong');
    }
   });
</script>
@stop