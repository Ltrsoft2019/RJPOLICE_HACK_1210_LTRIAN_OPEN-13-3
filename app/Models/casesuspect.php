<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class casesuspect extends Model
{
    use HasFactory;
    protected $table ="complaint_suspect";
    protected $primaryKey="complaint_suspect_id";
}
