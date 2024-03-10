<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'parent_comment_id',
        'name',
        'comment_data'
    ];

    public function replies(){
        return $this->hasMany(Comment::class, 'parent_comment_id');
    }


// Comment belong parent comment
    
    public function parentComment(){
        return $this->belongsTo(Comment::class, 'parent_comment_id');
    }
    
}   