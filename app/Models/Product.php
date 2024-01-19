<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'category_product_id',
        'name',
        'amount'
    ];

     /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function setAmountAttribute($attribute)
    {
        $attribute = str_replace(".","", $attribute);
        $attribute = strtr($attribute, "," , ".");
        (float)$this->attributes['amount'] = floatval($attribute);
    }


    public function getAmountAttribute($attribute)
    {
        return $this->attributes['amount'] =  number_format($attribute, 2, ',', '.');
    }

    /**
     * Get the category that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(CategoryProduct::class,'category_product_id');
    }


}
