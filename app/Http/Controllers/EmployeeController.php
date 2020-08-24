<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Product;
use App\Category;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function create(Request $request)
    {
        $employeeCategories = Category::all();
        
        $params = [
            'title' => 'Add New Employee',
            'employeeCategories' => $employeeCategories,
        ];
        return view('employees.create')->with($params);
    }
    
    /**
     * List of all employees
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        // $employees = Employee::orderBy('id');

        $employees = Employee::all();

        $params = [
            'title' => 'Employees Listing',
            'employees' => $employees,
        ];
        return view('employees.view')->with($params);
    }

    /**
     * Create a new employee
     *
     * @param EmployeeRequest $request
     * @return Response
     */
    public function store(Request $request)
    {
        $employee = new Employee;

        if ($request->hasFile('avatar')) {
            $fileName = Str::random(30);
            $extension = $request->avatar->extension();
            $fullFileName = "{$fileName}.{$extension}";

            if ($request->avatar->storeAs('public/images/employees', $fullFileName)) {
                $employee->avatar = $fullFileName;
            }else{
                $employee->avatar = "profile.jpg";
            }
        }else{
            $employee->avatar = "profile.jpg";
        }

        $employee->name         = $request->name;
        $employee->description  = $request->description;
        $employee->designation  = $request->designation;
        $employee->phone        = $request->phone;

        $employee->save();

        $categories = $request->input('category_id');
        
        $counter = 0;
        $categories_list = '';
        foreach ($categories as $key => $value) {
            if( $counter == 0 ){
                $categories_list = $value;
            }else{
                $categories_list .= ", " .  $value;
            }
            $counter++;
        }

        $category = Category::find([$categories_list]); // [1, 2]
        $employee->categories()->attach($category);

        return redirect()->route('employee.index')->with('success', "The employee <strong>$employee->name</strong> has successfully been created.");
    }






    public function show(Employee $employee)
    {
       return view('employees.show', compact('employee'));
    }

    public function edit($id)
    {
        try
        {
            $employeeCategories = Category::all();
            $employee = Employee::findOrFail($id);

            foreach($employee->categories as $cat) {
                $currentCats[] = $cat->pivot->category_id;
            }

            $params = [
                'employeeCategories' => $employeeCategories,
                'employee' => $employee,
                'currentCats' => $currentCats,
            ];
            return view('employees.edit')->with($params);
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
     * Update specific employee
     *
     * @param EmployeeRequest $request
     * @param $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        if ($request->hasFile('avatar')) {
            $currentAvatar = $employee->avatar;

            if($currentAvatar) {
                $file = "public/images/employees/{$currentAvatar}";

                if(Storage::exists($file)) {
                    Storage::delete($file);
                }
            }

            $fileName = Str::random(30);
            $extension = $request->avatar->extension();
            $fullFileName = "{$fileName}.{$extension}";

            if ($request->avatar->storeAs('public/images/employees', $fullFileName)) {
                $employee->avatar = $fullFileName;
            }else{
                $employee->avatar = "profile.jpg";
            }
        }

        $employee->name = $request->name;
        $employee->description = $request->description;
        $employee->designation  = $request->designation;
        $employee->phone        = $request->phone;
        
        $employee->save();

        $categories = $request->input('category_id');
        
        $counter = 0; 
        $categories_list = '';
        foreach ($categories as $key => $value) {
            if( $counter == 0 ){
                $categories_list = $value;
            }else{
                // $categories .= ", " .  $value;
                $categories_list .= ", " .  $value;
            }
            $counter++;
        }

        $category = Category::find([$categories_list]);
        $employee->categories()->sync($category);

        return redirect()->route('employee.index')->with('success', "The employee <strong>$employee->name</strong> has successfully been updated.");

        // return response($employee, Response::HTTP_CREATED);
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);

        $currentAvatar = $employee->avatar;

        if($currentAvatar) {
            $file = "public/images/employees/{$currentAvatar}";

            if(Storage::exists($file)) {
                Storage::delete($file);
            }
        }

        $employee->categories()->detach();

        Employee::destroy($id);

        return redirect()->route('employee.index')->with('success', "The employee has deleted successfully.");
    }


    public function removeCategory(Employee $employee)
    {
            $category = Category::find(2);

            $employee->categories()->detach($category);
            
            return 'Success';
    }

    public function getEmpByProd($id = 0){
        
        if($id==0){
            $arr['data'] = Employee::orderBy('id', 'asc')->get(); 
        }else{
            $categories = Product::findOrFail($id)->categories;
            
            $counter = 0; 
            $categories_list = '';
            foreach ($categories as $categoy) {
                if( $counter == 0 ){
                    $categories_list = $categoy['id'];
                }else{
                    $categories_list .= ", " . $categoy['id'];
                }
                $counter++;
            }

            $arr['data'] = Employee::select('id', 'name')->whereIn('id', [$categories_list])->get();
        }
        echo json_encode($arr);
        exit;
      }

}