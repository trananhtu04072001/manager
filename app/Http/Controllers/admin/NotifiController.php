<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Notifi;
use App\Responsitory\NotifiResponsitory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class NotifiController extends Controller
{
    public function __construct(NotifiResponsitory $notifiResponsitory)
    {
        $this->notifiResponsitory = $notifiResponsitory;
    }

    
    public function Notifi_schedule() {
        $exam_schedule = $this->notifiResponsitory->getAll()->where('read_at',null);
        return view('notifi.exam',['exam_schedule' => $exam_schedule]);
    }

    public function update_notifi($id) {
       $update = Notifi::find($id);
       $update->read_at = Carbon::now();
       $update->save();
        return redirect()->route('notifi.schedule')->with('success','Cập nhật thành công');
    }

    public function notifi_old() {
        $exam_schedule = $this->notifiResponsitory->getAll()->where('read_at','!=',null);
        return view('notifi.exam_old',['exam_schedule' => $exam_schedule]);
    }
}
