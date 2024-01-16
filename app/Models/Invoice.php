<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\App;

class Invoice extends Model
{
    use HasFactory;
    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    /**
     * @return string
     */
    public function getDetailUrlAttribute(): string
    {
        return route('invoice.show',$this->id);
    }

    /**
     * @return string
     */
    public function getParsedPreviousAmountAttribute(): string
    {
        return number_format($this->previous_amount,2);
    }

    /**
     * @return string
     */
    public function getParsedReceivedAmountAttribute(): string
    {
        return number_format($this->received_amount,2);
    }

    /**
     * @return string
     */
    public function getParsedCarriedOverAttribute(): string
    {
        return number_format($this->carried_over,2);
    }

    /**
     * @return bool|string
     */
    public function getRegularTaxableAmountAttribute(): bool|string
    {
        if ($this->items){
            $regularTaxedItems = $this->items->where('reduced_tax',false)->pluck(['purchase_price'])->sum();
            return number_format((config('constants.regular_tax') / 100) * $regularTaxedItems,2);
        }
        return false;
    }

    /**
     * @return false
     */
    public function getReducedTaxableAmountAttribute(): bool
    {
        if ($this->items){
            return $this->items->where('reduced_tax',false)->pluck(['purchase_price'])->sum();

            return number_format((config('constants.reduced_tax') / 100) * $reducedTaxedItems,2);
        }
        return false;
    }

    /**
     * @return string
     */
    protected function getParsedDeadlineAttribute(): string
    {
        if(APP::isLocale('ja')){
            return date('Y年m月d日', strtotime($this->deadline));
        }
        return date('Y-m-d', strtotime($this->deadline));
    }


    /**
     * Get the comments for the blog post.
     */
    public function items(): HasMany
    {
        return $this->hasMany(InvoiceItem::class)
            ->orderBy('voucher_date','ASC')
            ->orderBy('voucher_no','ASC');
    }

    /**
     * @return BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * @return BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * @return bool
     */
    public function performCalculations(): bool
    {
        if ($this->items){
            $regularTaxedItems = $this->items->where('reduced_tax',false)->pluck(['purchase_price']);
            $reducedTaxedItems = $this->items->where('reduced_tax',true)->pluck(['purchase_price']);

            $totalRegularItemsSum = $regularTaxedItems->sum();
            $totalReducedItemsSum = $reducedTaxedItems->sum();

            $regularTaxAmount = (config('constants.regular_tax') / 100) * $totalRegularItemsSum;
            $reducedTaxAmount = (config('constants.reduced_tax') / 100) * $totalReducedItemsSum;

            $consumptionAmount = $regularTaxAmount + $reducedTaxAmount;
            $purchasedAmount = $totalRegularItemsSum + $totalReducedItemsSum;
            $currentPurchaseAmount = $purchasedAmount + $this->carried_over + $consumptionAmount;

            $this->update([
                'purchased_amount' => number_format($purchasedAmount,2),
                'consumption_tax' => number_format($consumptionAmount,2),
                'total_purchase' => number_format($purchasedAmount + $consumptionAmount,2),
                'current_purchase_amount' => number_format($currentPurchaseAmount,2),
                'regular_tax_amount' => number_format($regularTaxAmount,2),
                'reduced_tax_amount' => number_format($reducedTaxAmount,2),
            ]);

        }

        return false;
    }

}
