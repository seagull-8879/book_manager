<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'category_id','publish_date','cover_image'];
    public function category() {
        return $this->belongsTo(Category::class);
    }
}
