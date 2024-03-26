<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';

    protected $fillable = [
        'title', 'description', 'post', 'main_image', 'slug', 'user_id', 'created_at'
    ];
    public $timestamps = false;

    public function postTags()
    {
        $this->hasMany(PostTag::class);
    }
}

