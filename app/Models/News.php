<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{


    protected $fillable = [
        'title',
        'description',
        'img',
        'news_type',
        'category_id',
        'language_id',
        'reporter_id',
    ];



    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
