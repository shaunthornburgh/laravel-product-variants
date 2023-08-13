<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'parent_id',
    ];

    /**
     * Get all products in this category
     * @return BelongsToMany
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    /**
     * This will give model's Parent
     * @return BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    /**
     * This will give model's Parent, Parent's parent, and so on until root.
     * @return BelongsTo
     */
    public function parentRecursive(): BelongsTo
    {
        return $this->parent()->with('parentRecursive');
    }

    /**
     * Get current model's all recursive parents in a collection in flat structure.
     */
    public function parentRecursiveFlatten()
    {
        $result = collect();
        $item = $this->parentRecursive;
        if ($item instanceof User) {
            $result->push($item);
            $result = $result->merge($item->parentRecursiveFlatten());
        }
        return $result;
    }

    /**
     * This will give model's Children
     * @return HasMany
     */
    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    /**
     * This will give model's Children, Children's Children and so on until last node.
     * @return HasMany
     */
    public function childrenRecursive(): HasMany
    {
        return $this->children()->with('childrenRecursive');
    }

    public function skus()
    {
        return $this->hasManyThrough(
            Sku::class,
            CategoryProduct::class,
            'category_id',
            'product_id',
            'id',
            'product_id'
        );
    }
}
