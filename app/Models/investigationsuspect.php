<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class investigationsuspect extends Model
{
    use HasFactory;
    protected $table ="investigation_suspect";
    protected $primaryKey="investigation_suspect_id";
}
