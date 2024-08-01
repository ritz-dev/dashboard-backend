<?php

namespace App\Models;

use App\Models\Astrologer;
use App\Models\AstrologicalTool;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AstrologerTool extends Model
{
    use HasFactory;

    protected $table = "astrologer_tools";

    protected $fillable = [
        "astrologer_id",
        "astrological_tool_id",
        "charge"
    ];

    public function astrologer(){
        return $this->belongsTo(Astrologer::class,'astrologer_id','id');
    }

    public function tool(){
        return $this->belongsTo(AstrologicalTool::class,'astrological_tool_id','id');
    }
}
