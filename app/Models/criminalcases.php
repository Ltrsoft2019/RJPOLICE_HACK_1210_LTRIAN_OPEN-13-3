<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class criminalcases extends Model
{
    use HasFactory;
    protected $table ="criminal_complaint";
    protected $primaryKey="criminal_complaint_id";
}
