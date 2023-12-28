<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class news_categories extends Model
{
    use HasFactory;
    protected $table ="news_category";
    protected $primaryKey="news_category_id";
}
