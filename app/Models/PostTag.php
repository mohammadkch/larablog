<?php

namespace App\Models;

use App\Http\Controllers\Dashboard\PostController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    protected $table = 'post_tag';
    protected $fillable = ['post_id', 'tag_id'];
    public $timestamps = false;

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

}
