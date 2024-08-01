<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserFinancialTransaction extends Model
{
    use HasFactory;

    protected $table = "user_financial_transactions";

    protected $fillable = [
        "user_id",
        "balance",
        "description",
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
