<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class casewitness extends Model
{
    use HasFactory;
    protected $table ="complaint_witness";
    protected $primaryKey="complaint_witness_id";
}
