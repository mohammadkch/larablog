<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tag';
    protected $fillable = [
        'name', 'slug'
    ];

    public function postTags()
    {
        $this->hasMany(PostTag::class);
    }
}
