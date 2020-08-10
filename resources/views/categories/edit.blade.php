@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 15px;">
  <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title">Edit Domain Details</h4>
                  <form class="needs-validation" method="post" action="{{ route('category.update',$category->id) }}" data-parsley-validate novalidate>
                    <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-sm-3 text-right control-label col-form-label">Domain Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Domain Name" value="{{ Request::old('name') ?: $category->name }}" required>
                            @if ($errors->has('name'))
                              <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group row {{ $errors->has('category_id') ? ' has-error' : '' }}">
                        <label for="category_id" class="col-sm-3 text-right control-label col-form-label">Parent Domain</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="category_id" name="category_id">
                              <option value="">Select Parent Domain</option>
                                @if(count($productCategories))
                                  @foreach($productCategories as $row)
                                    <option value="{{ $row->id }}" {{ $row->id == $category->parent_id ? 'selected="selected"' : ''}}>{{$row->name}}</option>
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
                          <button type="submit" class="btn btn-info waves-effect waves-light m-t-10">Update Domain</button>
                          <a href="{{route('category.index')}}" class="btn btn-inverse waves-effect waves-light m-t-10">Cancel</a>
                      </div>
                  </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection