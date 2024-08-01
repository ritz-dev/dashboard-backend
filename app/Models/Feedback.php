<?php

namespace App\Models;

use App\Models\User;
use App\Models\AppointmentAnswer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Feedback extends Model
{
    use HasFactory;

    protected $table = "feedback";

    protected $fillable = [
        "appointment_answer_id",
        "user_id",
        "comment",
        "feedback_date"
    ];

    public function appointmentAnswer(){
        return $this->belongsTo(AppointmentAnswer::class,'appointment_answer_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
