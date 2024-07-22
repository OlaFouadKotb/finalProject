<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;

class Beverage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'content',
        'price',
        'published',
        'special',
        'image',
        'category_id'
    ];
    protected $dates = ['deleted_at'];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
