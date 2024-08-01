<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserActivityLog extends Model
{
    use HasFactory;

    protected $table = "user_activity_logs";

    protected $fillable = [
        "user_id",
        "action",
        "log_timestamp",
        "details"
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
