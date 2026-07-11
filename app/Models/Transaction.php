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

    private function formatRupiah($value)
    {
        return Number::currency($value, in: 'IDR', locale: 'id', precision: 0);
    }

    protected function formattedTotalAmount(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->formatRupiah($this->total_amount),
        );
    }

    protected function formattedPaymentAmount(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->formatRupiah($this->payment_amount),
        );
    }

    protected function formattedChangeAmount(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->formatRupiah($this->change_amount),
        );
    }
}
