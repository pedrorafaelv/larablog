<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Postimage extends Model
{
    
    use HasFactory;
    protected $fillable=['post_id', 'image'];

    public function Post(){
        return$this->belongsTo(Post::class);
    }
}
