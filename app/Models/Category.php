<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Beverage;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes; 


    // Specify the fillable attributes
    protected $fillable = ['name'];

    public function beverages()
    {
        return $this->hasMany(Beverage::class);
    }


    }

