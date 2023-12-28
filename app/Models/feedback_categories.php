<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedback_categories extends Model
{
    use HasFactory;
    protected $table ="feedback_category";
    protected $primaryKey="feedback_category_id";
}
