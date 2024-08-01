<?php

namespace App\Models;

use App\Models\AppointmentQuestion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AppointmentAnswer extends Model
{
    use HasFactory;

    protected $table = "appointment_answers";

    protected $fillable = [
        "appointment_question_id",
        "message"
    ];

    public function appointmentQuestion(){
        return $this->belongsTo(AppointmentQuestion::class,'appointment_question_id','id');
    }
}
