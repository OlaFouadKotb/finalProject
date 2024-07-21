<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Beverage;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes; 

    // Define the table if it's not following Laravel's naming convention
    // protected $table = 'categories';

    // Specify the fillable attributes
    protected $fillable = ['name'];

    public function beverages()
    {
        return $this->hasMany(Beverage::class);
    }


    // استخدام طريقة boot لتعريف الحدث deleting
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($category) {
            // تحقق إذا كانت الفئة تحتوي على مشروبات
            if ($category->beverages()->count() > 0) {
                // إذا كانت تحتوي على مشروبات، ألقِ استثناء لمنع الحذف
                throw new \Exception("Cannot delete category that contains beverages.");
            }
        });
    }
}
