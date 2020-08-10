@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 15px;">
  <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title">Edit Task Details</h4>
                  <form class="needs-validation" method="post" action="{{ route('task.update', $task->id) }}" enctype="multipart/form-data" data-parsley-validate novalidate>
                    
                    <div class="form-group row {{ $errors->has('product_id') ? ' has-error' : '' }}">
                        <label for="product_id" class="col-sm-3 text-right control-label col-form-label">Task Product</label>
                        <div class="col-sm-9">
                            
                            <select class="form-control" id="product_id" name="product_id">
                              

                                @if(count($taskProducts))
                                  @foreach($taskProducts as $row)
                                    <option value="{{ $row->id }}"

                                        
                                        >
                                        {{$row->name}}
                                    </option>
                                  @endforeach
                                @endif
                            </select>
                            @if ($errors->has('product_id'))
                            <span class="help-block">{{ $errors->first('product_id') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row {{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description" class="col-sm-3 text-right control-label col-form-label">Task Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="description" name="description" placeholder="Enter Task Description" required>{{ Request::old('description') ?: $task->description }}</textarea>
                            @if ($errors->has('description'))
                              <span class="help-block">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row {{ $errors->has('employee_id') ? ' has-error' : '' }}">
                        <label for="employee_id" class="col-sm-3 text-right control-label col-form-label">Task Employee</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="employee_id" name="employee_id[]" multiple="multiple">
                                @if(count($taskEmployees))
                                  @foreach($taskEmployees as $row)
                                    <option value="{{ $row->id }}"

                                      @if(in_array($row->id, $currentEmps))
                                        selected="selected"
                                        @endif


                                      >{{$row->name}}</option>
                                  @endforeach
                                @endif
                            </select>
                            @if ($errors->has('employee_id'))
                            <span class="help-block">{{ $errors->first('employee_id') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group m-b-0">
                      <div class="offset-sm-3 col-sm-9">
                          <input type="hidden" name="_token" value="{{ Session::token() }}">
                          <button type="submit" class="btn btn-info waves-effect waves-light m-t-10">Submit Form</button>
                          <a href="{{route('task.index')}}" class="btn btn-inverse waves-effect waves-light m-t-10">Cancel</a>
                      </div>
                  </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection