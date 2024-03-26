<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    protected $table = 'post_image';
    protected $fillable = ['user_id', 'image'];
    public $timestamps = false;

    public function post()
    {
        $this->belongsTo(Post::class, 'id', 'post_id');
    }

    public function user()
    {
        $this->belongsTo(User::class, 'id', 'user_id');
    }

}
