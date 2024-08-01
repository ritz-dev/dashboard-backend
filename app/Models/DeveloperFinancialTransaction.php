<?php

namespace App\Models;

use App\Models\Developer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeveloperFinancialTransaction extends Model
{
    use HasFactory;

    protected $table = "developer_financial_transactions";

    protected $fillable = [
        "developer_id",
        "balance",
        "description"
    ];

    public function developer(){
        return $this->belongsTo(Developer::class,'developer_id','id');
    }
}
