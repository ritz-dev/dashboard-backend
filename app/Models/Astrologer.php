<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Astrologer extends Model
{
    use HasFactory;

    protected $table = "astrologers";

    protected $fillable = [
        "full_name",
        "password",
        "email",
        "phone",
        "img_url",
        "experience_years",
        "specialization",
        "bio",
        "gender",
        "cash_amount",
        "date_created",
    ];
}
