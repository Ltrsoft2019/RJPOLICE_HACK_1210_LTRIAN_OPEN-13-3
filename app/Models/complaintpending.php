<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class complaintpending extends Model
{
    use HasFactory;
    protected $table ="complaint";
    protected $primaryKey="complaint_id";
}
