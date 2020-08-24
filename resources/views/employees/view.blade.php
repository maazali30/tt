@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 15px;">
  <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title">List of Employees <a href="{{route('employee.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Create New </a></h4>
                  <div class="table-responsive m-t-40">
                      <table id="myTable" class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>Name</th>
                                  <th>Description</th>
                                  <th>Designation</th>
                                  <th>Phone</th>
                                  <th>Domain</th>
                                  <th>Photo</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              @if(count($employees))
                                  @foreach($employees as $employee)
                                  <tr>
                                      <td>{{ $employee->id }}</td>
                                      <td>{{ $employee->name }}</td>
                                      <td>{{ $employee->description }}</td>
                                      <td>{{ $employee->designation }}</td>
                                      <td>{{ $employee->phone }}</td>
                                      <td>
                                          <ol>
                                            @foreach($employee->categories as $category)
                                                <li>{{ $category->name }}</li>
                                            @endforeach
                                          </ol>
                                      </td>
                                      <td><img src="{{ asset('public/storage/images/employees/'.$employee->avatar) }}" width="50" height="50" alt=""></td>
                                      <td>
                                          
                                          <form action="{{route('employee.edit',[$employee->id])}}" method="POST" style="display: inline-block;">
                                           @method('PUT')
                                           @csrf
                                           <button class="btn btn-info btn-xs" type="submit"><i class="fa fa-trash-o" title="Edit"></i> Edit </button>         
                                          </form>

                                          <form action="{{route('employee.destroy',[$employee->id])}}" method="POST" style="display: inline-block;">
                                           @method('DELETE')
                                           @csrf
                                           <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o" title="Delete"></i> Delete </button>         
                                          </form>
                                      </td>
                                  </tr>
                                  @endforeach
                              @endif
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
