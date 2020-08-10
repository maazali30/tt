<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Location extends Model
{
    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'locations';

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
        return $this->belongsTo('App\Location', 'parent_id','id');
    }
    
    public function childs() {
        return $this->hasMany('App\Location','parent_id','id');
    }

    public function product()
    {
        return $this->hasOne('App\Product','location_id');
    }
}
