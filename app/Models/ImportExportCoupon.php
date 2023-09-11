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
        "name",
        "supplier_id",
        "warehouse_id",
        "status",
        "user_id",
    ];
    public function getCreatedAtAttribute($value)
    {
        $date = Carbon::parse($value);
        return $date->format('d-m-Y H:i:s');
    }
    public function Supplier()
    {
        return $this->hasOne('App\Models\Supplier', 'id', 'supplier_id');
    }
}
