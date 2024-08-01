<?php

namespace App\Models;

use App\Models\Developer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AstrologicalTool extends Model
{
    use HasFactory;

    protected $table = "astrological_tools";

    protected $fillable = [
        "tool_name",
        "description",
        "price",
        "developer_id"
    ];

    public function developer(){
        return $this->belongsTo(Developer::class,'developer_id','id');
    }
}
