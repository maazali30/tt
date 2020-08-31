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

    public $fillable = ['parent_id', 'name'];
    
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    /**
     * Get the index name for the model.
     *
     * @return string
    */
    
    public function parent() { 
        return $this->belongsTo('App\Category', 'parent_id','id');
    }

    public function childs() {
        return $this->hasMany('App\Category','parent_id','id');
    }
}
