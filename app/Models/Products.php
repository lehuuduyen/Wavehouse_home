<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';
    protected $fillable = [
        "code",
        "barcode",
        "name",
        "price_old",
        "price_capital",
        "price_sell",
        "file",
        "count"
    ];
}
