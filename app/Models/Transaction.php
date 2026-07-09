<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'invoice_number', 'total_amount', 'payment_amount', 'change_amount','status','payment_method'];
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function items() {
        return $this->hasMany(TransactionItem::class);
    }
}
