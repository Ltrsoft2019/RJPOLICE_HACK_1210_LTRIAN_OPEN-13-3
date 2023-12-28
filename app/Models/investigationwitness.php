<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class investigationwitness extends Model
{
    use HasFactory;
    protected $table ="investigation_witness";
    protected $primaryKey="investigation_witness_id";
}
