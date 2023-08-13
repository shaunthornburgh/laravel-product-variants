<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Sku extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku',
        'product_id',
        'unit_amount',
    ];

    public function attributes(): BelongsToMany
    {
        return $this->belongsToMany(Attribute::class)
            ->using(AttributeSku::class)
            ->withPivot('id', 'value');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
