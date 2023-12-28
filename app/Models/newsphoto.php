<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class newsphoto extends Model
{
    use HasFactory;
    protected $table ="news_photos";
    protected $primaryKey="news_photos_id";
}
