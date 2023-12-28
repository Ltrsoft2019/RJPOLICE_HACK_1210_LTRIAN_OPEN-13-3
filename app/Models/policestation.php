<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class policestation extends Model
{
    use HasFactory;
    protected $table ="police_station";
    protected $primaryKey="police_station_id";
}
