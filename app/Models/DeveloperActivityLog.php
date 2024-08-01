<?php

namespace App\Models;

use App\Models\Developer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeveloperActivityLog extends Model
{
    use HasFactory;

    protected $table = "developer_activity_logs";

    protected $fillable = [
        "developer_id",
        "action",
        "log_timestamp",
        "details"
    ];

    public function developer(){
        return $this->belongsTo(Developer::class,'developer_id','id');
    }
}
