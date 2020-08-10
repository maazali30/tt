<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee;

class Task extends Model
{
    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'tasks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'avatar'
    ];

    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
