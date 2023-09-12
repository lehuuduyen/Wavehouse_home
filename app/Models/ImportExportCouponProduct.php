<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportExportCouponProduct extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'import_export_coupon_product';
    protected $fillable = [
        "product_id",
        "quantity",
        "price",
        "wavehouse_id",
        "coupon_id",
        "status",
    ];
    public function Product()
    {
        return $this->hasOne('App\Models\Products', 'id', 'product_id');
    }
}
