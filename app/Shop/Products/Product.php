<?php

namespace App\Shop\Products;

use App\Exceptions\NotImplementedException;
use App\Models\Model;
use App\Shop\Categories\Category;
use App\Shop\ProductImages\ProductImage;
use Gloudemans\Shoppingcart\Contracts\Buyable;
use Illuminate\Support\Collection;
use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends Model implements Buyable
{
    use SearchableTrait;

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'products.name' => 10,
            'products.description' => 5
        ]
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'cover',
        'quantity',
        'price',
        'status',
        'sale_price',
        'slug',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function categories()
    {
        throw new NotImplementedException();
    }

    /**
     * Get the identifier of the Buyable item.
     *
     * @param null $options
     * @return int|string
     */
    public function getBuyableIdentifier($options = null)
    {
        return $this->id;
    }

    /**
     * Get the description or title of the Buyable item.
     *
     * @param null $options
     * @return string
     */
    public function getBuyableDescription($options = null)
    {
        return $this->name;
    }

    /**
     * Get the price of the Buyable item.
     *
     * @param null $options
     * @return float
     */
    public function getBuyablePrice($options = null)
    {
        return $this->price;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        throw new NotImplementedException();// $this->hasMany(ProductImage::class);
    }

    /**
     * @param string $term
     * @return Collection
     */
    public function searchProduct(string $term) : Collection
    {
        throw new NotImplementedException();
        //return self::search($term)->get();
    }
}
