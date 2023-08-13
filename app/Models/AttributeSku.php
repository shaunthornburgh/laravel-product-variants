<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class AttributeSku extends Pivot
{
    use HasFactory;

    protected $fillable = [
        'attribute_id',
        'sku_id',
        'value',
    ];

    protected $table = 'attribute_sku';

    public function sku(): BelongsTo
    {
        return $this->belongsTo(Sku::class);
    }

    public function attribute(): BelongsTo
    {
        return $this->belongsTo(Attribute::class);
    }
}
