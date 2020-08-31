<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Location;
use App\Task;
use App\Employee;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $tasks = Task::paginate(15);
        $tasks = Task::orderBy('id', 'desc')->take(10)->get();
        
        $params = [
            'title' => 'Tasks Listing',
            'tasks' => $tasks,
        ];
        
        return view('home')->with($params);;
    }
}
