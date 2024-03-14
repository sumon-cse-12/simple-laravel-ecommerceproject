<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','admin_id','title','url','blog_category_id','image','description','status'
    ];
    public function blog_category(){
        return $this->belongsTo(BlogCategory::class, 'blog_category_id', 'id');
    }
    public function written_by(){
        return $this->belongsTo(User::class, 'admin_id', 'id')->withDefault();
    }
}
