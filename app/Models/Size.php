<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $table = "sizes";

    protected $fillable = [
        'product_id',
        'size',
        'quantity',
    ];

    public function product()
    {
        $this->belongsTo(Product::class);
    }
}
