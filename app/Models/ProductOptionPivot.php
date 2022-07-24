<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOptionPivot extends Model
{
    use HasFactory;

    protected $guarded  = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function product_option()
    {
        return $this->belongsTo(ProductOption::class);
    }
}
