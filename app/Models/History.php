<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $table = 'history';
    protected $fillable = [
    "amount",
   "network",
   "fee",
   "price",
   "total",
   "bank",
   "stk",
    "code",
   "wallet",
   "sdt",
   "description",
    "status",
    "status_process",
    "created_at",
    "updated_at",
    ];
}
