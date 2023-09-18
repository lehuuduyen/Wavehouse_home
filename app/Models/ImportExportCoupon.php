<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportExportCoupon extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'import_export_coupon';
    protected $fillable = [
        "code",
        "price",
        "customer_id",
        "name",
        "supplier_id",
        "wavehouse_id",
        "status",
        "user_id",
    ];
    public function getCreatedAtAttribute($value)
    {
        $date = Carbon::parse($value);
        return $date->format('d-m-Y H:i:s');
    }
    public function Customer()
    {
        return $this->hasOne('App\Models\Customer', 'id', 'customer_id');
    }
    public function Supplier()
    {
        return $this->hasOne('App\Models\Supplier', 'id', 'supplier_id');
    }
    public function Wavehouse()
    {
        return $this->hasOne('App\Models\Wavehouse', 'id', 'wavehouse_id');
    }
    public function CouponProduct()
    {
        return $this->hasMany('App\Models\ImportExportCouponProduct', 'coupon_id', 'id')->with('product');
    }
}
