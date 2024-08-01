<?php

namespace App\Models;

use App\Models\Administrator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdministratorActivityLog extends Model
{
    use HasFactory;

    protected $table = "administrator_activity_logs";

    protected $fillable = [
        "administrator_id",
        "action",
        "log_timestamp",
        "details"
    ];

    public function administrator(){
        return $this->belongsTo(Administrator::class,'administrator_id','id');
    }
}
