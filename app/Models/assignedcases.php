<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assignedcases extends Model
{
    use HasFactory;
    protected $table ="police_complaint";
    protected $primaryKey="police_complaint_id";
}
