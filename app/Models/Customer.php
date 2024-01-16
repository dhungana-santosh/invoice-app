<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    /**
     * Get the comments for the blog post.
     */
    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }
}
