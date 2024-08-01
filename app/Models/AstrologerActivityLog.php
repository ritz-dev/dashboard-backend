<?php

namespace App\Models;

use App\Models\Astrologer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AstrologerActivityLog extends Model
{
    use HasFactory;

    protected $table = "astrologer_activity_logs";

    protected $fillable = [
        "astrologer_id",
        "action",
        "log_timestamp",
        "details"
    ];

    public function astrologer(){
        return $this->belongsTo(Astrologer::class,'astrologer_id','id');
    }
}
