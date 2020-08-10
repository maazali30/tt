<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Task;

class Employee extends Model
{
    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'employees';

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

    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }
}