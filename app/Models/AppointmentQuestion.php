<?php

namespace App\Models;

use App\Models\User;
use App\Models\Astrologer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AppointmentQuestion extends Model
{
    use HasFactory;

    protected $table = "appointment_questions";

    protected $fillable = [
        "user_id",
        "astrologer_id",
        "request_type",
        "request_message",
        "request_datetime",
        "status",
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function astrologer(){
        return $this->belongsTo(Astrologer::class,'astrologer','id');
    }
}
