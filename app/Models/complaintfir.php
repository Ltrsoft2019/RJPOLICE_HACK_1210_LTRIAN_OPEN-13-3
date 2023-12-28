<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class complaintfir extends Model
{
    use HasFactory;
    protected $table ="complaint_fir";
    protected $primaryKey="complaint_fir_id";
}
