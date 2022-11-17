<?php

use App\Http\Controllers\admin\AccountController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AttendanceController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\CalendarController;
use App\Http\Controllers\admin\CourseController;
use App\Http\Controllers\admin\LevelController;
use App\Http\Controllers\admin\MajorController;
use App\Http\Controllers\admin\NotifiController;
use App\Http\Controllers\admin\PointController;
use App\Http\Controllers\admin\ProgramController;
use App\Http\Controllers\admin\RoomController;
use App\Http\Controllers\admin\SalaryController;
use App\Http\Controllers\admin\Schedule_againController;
use App\Http\Controllers\admin\ScheduleController;
use App\Http\Controllers\admin\Send_mailController;
use App\Http\Controllers\admin\StudentController;
use App\Http\Controllers\admin\SubjectController;
use App\Http\Controllers\admin\TestScheduleController;
use App\Http\Controllers\admin\Tuition_againController;
use App\Http\Controllers\admin\TuitionController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function () {
    // account
    Route::get('/register',[AccountController::class,'getRegister'])->name('admin.register');
    Route::post('/register',[AccountController::class,'postRegister']);
    Route::get('/',[AccountController::class,'getLogin'])->name('admin.login');
    Route::post('/',[AccountController::class,'postLogin']);
    Route::get('/logout',[AccountController::class,'logout'])->name('admin.logout');
    // home
    Route::get('/manager',[HomeController::class,'index'])->name('home');

    // teacher
    Route::get('/teacher',[AdminController::class,'listTeacher'])->name('admin.listTeacher');
    Route::get('/staff',[AdminController::class,'listStaff'])->name('admin.listStaff');
    Route::get('/updateStatus/{id}',[AdminController::class,'updateStatus'])->name('admin.updateStatus');
    //    Level
    Route::get('/level',[LevelController::class,'index'])->name('level.index');
    Route::get('/addlevel',[LevelController::class,'getLevel'])->name('level.add');
    Route::post('/addlevel',[LevelController::class,'postLevel']);
    Route::get('/delete/{id}',[LevelController::class,'delete'])->name('level.delete');

    // Course
    Route::get('/course',[CourseController::class,'index'])->name('course.index');
    Route::get('/addcourse',[CourseController::class,'getCourse'])->name('course.add');
    Route::post('/addcourse',[CourseController::class,'postCourse']);
    Route::get('/deleteCourse/{id}',[CourseController::class,'delete'])->name('course.delete');

    // major
    Route::get('/major',[MajorController::class,'index'])->name('major.index');
    Route::get('/addMajor',[MajorController::class,'getMajor'])->name('major.add');
    Route::post('/addMajor',[MajorController::class,'postMajor']);
    Route::get('/deleteMajor/{id}',[MajorController::class,'delete'])->name('major.delete');

    // subject
    Route::get('/subject',[SubjectController::class,'index'])->name('subject.index');
    Route::get('/addsubject',[SubjectController::class,'getSubject'])->name('subject.add');
    Route::post('/addsubject',[SubjectController::class,'postSubject']);
    Route::get('deleteSubject/{id}',[SubjectController::class,'delete'])->name('subject.delete');

    // room
    Route::get('/room',[RoomController::class,'index'])->name('room.index');
    Route::get('/addRoom',[RoomController::class,'getRoom'])->name('room.add');
    Route::post('/addRoom',[RoomController::class,'postRoom']);

    // program
    Route::get('/program',[ProgramController::class,'index'])->name('program.index');
    Route::get('/addprogram',[ProgramController::class,'getProgram'])->name('program.add');
    Route::post('/addprogram',[ProgramController::class,'postProgram']);
    Route::get('/deleteProgram/{id}',[ProgramController::class,'delete'])->name('program.delete');
    // calendar
    Route::get('/calendar',[CalendarController::class, 'index'])->name('admin.calendar');

    // semmester
    Route::get('/semmester',[ProgramController::class,'getSemmester'])->name('semmester.get');
    Route::post('/semmester',[ProgramController::class,'postSemmester']);

    // student
    Route::get('/student/{id}',[StudentController::class,'index'])->name('student.index');
    Route::get('/addStudent',[StudentController::class,'getStudent'])->name('student.add');
    Route::post('/addStudent',[StudentController::class,'postStudent']);
    Route::get('/statusStudent/{id}',[StudentController::class,'statusStudent'])->name('student.status');

    // schedule
    Route::get('/schedule',[ScheduleController::class,'index'])->name('schedule.index');
    Route::get('/schedule_learn',[ScheduleController::class,'schedule_learn'])->name('schedule.learn');
    Route::get('/addSchedule',[ScheduleController::class,'getSchedule'])->name('schedule.get');
    Route::post('/addSchedule',[ScheduleController::class,'postSchedule']);
    Route::get('/updateSchedule/{id}',[ScheduleController::class,'updateSchedule'])->name('schedule.update');
    Route::post('/updateSchedule/{id}',[ScheduleController::class,'postUpdate']);
    Route::get('/hisSchedule',[ScheduleController::class,'hisSchedule'])->name('schedule.history');
    Route::get('/detail_hisSchedule/{id}',[ScheduleController::class,'detail_hisSchedule'])->name('schedule.history_detail');

    // attendance
    Route::get('/addAttendance/{id}',[AttendanceController::class,'getAtten'])->name('atten.add');
    Route::post('/addAttendance/{id}',[AttendanceController::class,'postAtten']);
    Route::get('/dili/{id}',[AttendanceController::class,'diLi'])->name('atten.dili');
    Route::post('/dili/{id}',[AttendanceController::class,'PostdiLi'])->name('diLi.post');

    // salary
    Route::get('/listSalary',[SalaryController::class,'index'])->name('salary.index');
    Route::get('/insertSalary',[SalaryController::class,'getInsert'])->name('salary.insert');
    Route::post('/insertSalary',[SalaryController::class,'postInsert']);
    Route::get('/detailSalary',[SalaryController::class,'detailSalary'])->name('salary.detail');

    // test_schedule
    Route::get('/testindex_one',[TestScheduleController::class,'index_one'])->name('test.index_one');
    Route::get('/testindex',[TestScheduleController::class,'index'])->name('test.index');
    Route::get('/testExam',[TestScheduleController::class,'getExam'])->name('test.get');
    Route::post('/testExam',[TestScheduleController::class,'postExam']);
    Route::get('/historyExam',[TestScheduleController::class,'historyExam'])->name('history.exam');
    Route::get('/historyExam_detail/{id}',[TestScheduleController::class,'historyExam_detail'])->name('historyExam.detail');

    // Notifi
    Route::get('/notifi_schedule',[NotifiController::class,'Notifi_schedule'])->name('notifi.schedule');
    Route::get('/notifi_old',[NotifiController::class,'notifi_old'])->name('notifi.old');
    Route::get('/update_notifi/{id}',[NotifiController::class,'update_notifi'])->name('notifi.update');

    // point
    Route::get('/getPoint/{id}',[PointController::class,'getPoint'])->name('insert.point');
    Route::post('/getPoint/{id}',[PointController::class,'postPoint']);
    Route::get('/getPointTwo/{id}',[PointController::class,'getPointTwo'])->name('insert.pointTwo');
    Route::post('/getPointTwo/{id}',[PointController::class,'postPointTwo']);
    Route::get('/class',[PointController::class,'getClass'])->name('point.class');
    Route::get('/class_Exam/{id}',[PointController::class,'getClass_Exam'])->name('point.class_Exam');
    Route::get('/class_Exam_detail/{id}',[PointController::class,'getClass_Exam_detail'])->name('point.class_Exam_detail');

    // tuition_course
    Route::get('/tuitionIndex',[TuitionController::class,'tuitionIndex'])->name('tuition.index');
    Route::get('/getuitionIndex',[TuitionController::class,'gettuitionIndex'])->name('get.tuition.index');
    Route::post('/getuitionIndex',[TuitionController::class,'posttuitionIndex']);
    Route::get('/tuition_detail',[TuitionController::class,'tuitionDetail'])->name('tuition.detail');
    Route::get('/tuitionUpdate/{id}',[TuitionController::class,'tuitionUpdate'])->name('tuition.update');


    // tuition_student
    Route::get('/update_tuition/{id}',[TuitionController::class,'get_tuitionUpdate'])->name('update.getTuition');
    Route::post('/update_tuition/{id}',[TuitionController::class,'post_tuitionUpdate']);

    // sendmail
    Route::get('/sendmail',[Send_mailController::class,'sendmail'])->name('mail.send');

    // tuition_again
    Route::get('/tuition_again',[Tuition_againController::class,'index'])->name('tuition_again.index');
    Route::get('/get_again',[Tuition_againController::class,'get_again'])->name('tuition_again.get');
    Route::post('/get_again',[Tuition_againController::class,'post_again']);
    Route::get('/again_detail',[Tuition_againController::class,'again_detail'])->name('again_detail');
    Route::get('/again_update/{id}',[Tuition_againController::class,'update'])->name('again_detail.update');

    // learn_again
    // Route::get('/learn_again',[Schedule_againController::class,'index'])->name('schedule_again.index');
    // Route::get('/get_Schedule_again',[Schedule_againController::class,'get_schedule'])->name('schedule_again.get');
    // Route::post('/get_Schedule_again',[Schedule_againController::class,'post_schedule']);
});
