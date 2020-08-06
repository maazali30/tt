<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Category extends Model
{
    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'categories';

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
