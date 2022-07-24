<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded  = [];

    public function digital_file()
    {
        return $this->hasMany(MultiDigitalFileProduct::class);
    }

    public function category()
    {
        return $this->hasMany(Category::class, 'id', 'category_id');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
