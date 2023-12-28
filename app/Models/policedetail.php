<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class policedetail extends Model
{
    use HasFactory;
    protected $table ="police";
    protected $primaryKey="police_id";
}
