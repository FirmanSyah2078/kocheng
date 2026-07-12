<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Number;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'invoice_number', 'total_amount', 'payment_amount', 'change_amount', 'status', 'payment_method'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(TransactionItem::class);
    }

    protected function formattedTotalAmount(): Attribute
    {
        return Attribute::make(
            get: fn () => Number::currency($this->total_amount, in: 'IDR', locale: 'id'),
        );
    }
}
