@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 15px;">
  <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title">Edit Employee Details</h4>
                  <form class="needs-validation" method="post" action="{{ route('employee.update', $employee->id) }}" enctype="multipart/form-data" data-parsley-validate novalidate>
                    <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-sm-3 text-right control-label col-form-label">Employee Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Employee Name" value="{{ Request::old('name') ?: $employee->name }}" required>
                            @if ($errors->has('name'))
                              <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description" class="col-sm-3 text-right control-label col-form-label">Employee Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="description" name="description" placeholder="Enter Employee Description" required>{{ Request::old('description') ?: $employee->description }}</textarea>
                            @if ($errors->has('description'))
                              <span class="help-block">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row {{ $errors->has('designation') ? ' has-error' : '' }}">
                        <label for="designation" class="col-sm-3 text-right control-label col-form-label">Employee Designation</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="designation" name="designation" placeholder="Enter Employee Designation" value="{{ Request::old('designation') ?: $employee->designation }}" required>
                            @if ($errors->has('designation'))
                              <span class="help-block">{{ $errors->first('designation') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row {{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label for="phone" class="col-sm-3 text-right control-label col-form-label">Employee Phone</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Employee Phone" value="{{ Request::old('phone') ?: $employee->phone }}" required>
                            @if ($errors->has('phone'))
                              <span class="help-block">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row {{ $errors->has('avatar') ? ' has-error' : '' }}">
                        <label for="avatar" class="col-sm-3 text-right control-label col-form-label">Employee Photo</label>
                        <div class="col-sm-9">
                            <input type="file" id="avatar" name="avatar">

                            @if ($errors->has('avatar'))
                              <span class="help-block">{{ $errors->first('avatar') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group row {{ $errors->has('category_id') ? ' has-error' : '' }}">
                        <label for="category_id" class="col-sm-3 text-right control-label col-form-label">Employee Domain</label>
                        <div class="col-sm-9">
                            
                            <select class="form-control" id="category_id" name="category_id[]" multiple="multiple">
                              

                                @if(count($employeeCategories))
                                  @foreach($employeeCategories as $row)
                                    <option value="{{ $row->id }}"

                                        @if(in_array($row->id, $currentCats))
                                        selected="selected"
                                        @endif
                                        >
                                        {{$row->name}}
                                    </option>
                                  @endforeach
                                @endif
                            </select>
                            @if ($errors->has('category_id'))
                            <span class="help-block">{{ $errors->first('category_id') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group m-b-0">
                      <div class="offset-sm-3 col-sm-9">
                          <input type="hidden" name="_token" value="{{ Session::token() }}">
                          <button type="submit" class="btn btn-info waves-effect waves-light m-t-10">Update Employee</button>
                          <a href="{{route('employee.index')}}" class="btn btn-inverse waves-effect waves-light m-t-10">Cancel</a>
                      </div>
                  </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection