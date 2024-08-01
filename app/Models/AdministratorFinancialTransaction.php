<?php

namespace App\Models;

use App\Models\Administrator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdministratorFinancialTransaction extends Model
{
    use HasFactory;

    protected $table = "administrator_financial_transactions";

    protected $fillable = [
        "administrator_id",
        "balance",
        "description"
    ];

    public function administrator(){
        return $this->belongsTo(Administrator::class,'administrator_id','id');
    }
}
