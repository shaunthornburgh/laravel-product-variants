<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public const ATTRIBUTES = [
        self::SIZE,
        self::COLOUR
    ];

    public const SIZE = 'size';

    public const COLOUR = 'colour';

    public function skus(): BelongsToMany
    {
        return $this->belongsToMany(Sku::class)
            ->using(AttributeSku::class)
            ->withPivot('id', 'value');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeSize($query)
    {
        $query->where('name', self::SIZE);
    }

    public function scopeColour($query)
    {
        $query->where('name', self::COLOUR);
    }
}
