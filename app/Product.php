<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Product extends Model
{
    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'avatar'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function location()
    {
        return $this->belongsTo('App\Location');
    }

    public function task()
    {
        return $this->hasOne('App\Task','product_id');
    }
}
