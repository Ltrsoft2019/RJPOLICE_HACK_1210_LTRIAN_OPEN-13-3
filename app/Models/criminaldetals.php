<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class criminaldetals extends Model
{
    use HasFactory;
    protected $table ="criminal_detail";
    protected $primaryKey="criminal_id";
}
