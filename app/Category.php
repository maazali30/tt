<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

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
        return $this->hasMany(Product::class, 'category_id');
    }
}
