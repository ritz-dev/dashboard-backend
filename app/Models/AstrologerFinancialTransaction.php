<?php

namespace App\Models;

use App\Models\Astrologer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AstrologerFinancialTransaction extends Model
{
    use HasFactory;

    protected $table = "astrologer_financial_transactions";

    protected $fillable = [
        "astrologer_id",
        "balance",
        "description"
    ];

    public function astrologer(){
        return $this->belongsTo(Astrologer::class,'astrologer_id','id');
    }
}
