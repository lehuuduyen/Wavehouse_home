<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wavehouse extends Model
{
    use HasFactory;
    protected $table = 'wavehouse';
    public function getCreatedAtAttribute($value)
    {
        $date = Carbon::parse($value);
        return $date->format('d-m-Y H:i:s');
    }
    public function Coupon()
    {
        return $this->hasMany('App\Models\ImportExportCoupon', 'wavehouse_id', 'id')->with('CouponProduct');
    }
}
