<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Employee;
use App\Product;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    public function create(Request $request)
    {
        $taskEmployees = Employee::all();
        $taskProducts = Product::all();
        
        $params = [
            'title' => 'Add New Task',
            'taskEmployees' => $taskEmployees,
            'taskProducts' => $taskProducts,
        ];
        return view('tasks.create')->with($params);
    }
    
    /**
     * List of all tasks
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        $tasks = Task::all();

        $params = [
            'title' => 'Tasks Listing',
            'tasks' => $tasks,
        ];
        return view('tasks.view')->with($params);
    }

    /**
     * Create a new task
     *
     * @param TaskRequest $request
     * @return Response
     */
    public function store(Request $request)
    {
        $task = new Task;

        // $task->name = $request->name;
        $task->description = $request->description;
        $task->product_id = $request->product_id;

        $task->save();

        $employees = $request->input('employee_id');
        
        $counter = 0; 
        $employees_list = '';
        foreach ($employees as $key => $value) {
            if( $counter == 0 ){
                $employees_list = $value;
            }else{
                $employees_list .= ", " .  $value;
            }
            $counter++;
        }

        $employee = Employee::find([$employees_list]);
        $task->employees()->attach($employee);

        return redirect()->route('task.index')->with('success', "The task <strong>$task->name</strong> has successfully been created.");
    }






    public function show(Task $task)
    {
       return view('tasks.show', compact('task'));
    }

    public function edit($id)
    {
        try
        {
            $taskEmployees = Employee::all();
            $taskProducts = Product::all();
            $task = Task::findOrFail($id);

            foreach($task->employees as $emp) {
                $currentEmps[] = $emp->pivot->employee_id;
            }

            $params = [
                'taskEmployees' => $taskEmployees,
                'taskProducts' => $taskProducts,
                'task' => $task,
                'currentEmps' => $currentEmps,
            ];
            return view('tasks.edit')->with($params);
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }

    /**
     * Update specific task
     *
     * @param TaskRequest $request
     * @param $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        // $task->name = $request->name;
        $task->description = $request->description;
        $task->product_id = $request->product_id;

        $task->save();

        $employees = $request->input('employee_id');
        
        $counter = 0; 
        $employees_list = '';
        foreach ($employees as $key => $value) {
            if( $counter == 0 ){
                $employees_list = $value;
            }else{
                // $employees .= ", " .  $value;
                $employees_list .= ", " .  $value;
            }
            $counter++;
        }

        $employee = Employee::find([$employees_list]);
        $task->employees()->sync($employee);

        return redirect()->route('task.index')->with('success', "The task <strong>$task->name</strong> has successfully been updated.");

        // return response($task, Response::HTTP_CREATED);
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        $task->employees()->detach();

        Task::destroy($id);

        return redirect()->route('task.index')->with('success', "The task has deleted successfully.");
    }


    public function removeEmployee(Task $task)
    {
            $employee = Employee::find(2);

            $task->employees()->detach($employee);
            
            return 'Success';
    }

    public function completed($id){
        $task = Task::findOrFail($id);

        $task->completed_at = date('Y-m-d H:i:s');

        $task->save();

        return redirect()->route('task.index')->with('success', "The task has marked as completed.");
    }

}