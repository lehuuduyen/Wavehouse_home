<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'history';
    protected $fillable = [
        "amount",
        "network",
        "fee",
        "bank",
        "stk",
        "wallet",
        "sdt"
    ];
}
