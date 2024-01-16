<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\App;

class InvoiceItem extends Model
{
    use HasFactory;
    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    /**
     * @return BelongsTo
     */
    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }

    /**
     * @return string
     */
    public function getParsedUnitPriceAttribute(): string
    {
        return number_format($this->unit_price,2);
    }

    /**
     * @return string
     */
    public function getParsedPurchasePriceAttribute(): string
    {
        return number_format($this->purchase_price,2);
    }

    /**
     * @return string
     */
    protected function getParsedVoucherDateAttribute(): string
    {
        if(APP::isLocale('ja')){
            return date('Y年m月d日', strtotime($this->voucher_date));
        }
        return date('Y-m-d', strtotime($this->voucher_date));
    }
}
