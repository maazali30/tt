@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 15px;">
  <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title">Edit Location Details</h4>
                  <form class="needs-validation" method="post" action="{{ route('location.update',$location->id) }}" data-parsley-validate novalidate>
                    <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-sm-3 text-right control-label col-form-label">Location Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Location Name" value="{{ Request::old('name') ?: $location->name }}" required>
                            @if ($errors->has('name'))
                              <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group row {{ $errors->has('Location_id') ? ' has-error' : '' }}">
                        <label for="Location_id" class="col-sm-3 text-right control-label col-form-label">Parent Location</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="location_id" name="location_id">
                              <option value="">Select Parent Location</option>
                                @if(count($productLocations))
                                  @foreach($productLocations as $row)
                                    <option value="{{ $row->id }}" {{ $row->id == $location->parent_id ? 'selected="selected"' : ''}}>{{$row->name}}</option>
                                  @endforeach
                                @endif
                            </select>
                            @if ($errors->has('Location_id'))
                            <span class="help-block">{{ $errors->first('Location_id') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group m-b-0">
                      <div class="offset-sm-3 col-sm-9">
                          <input type="hidden" name="_token" value="{{ Session::token() }}">
                          <button type="submit" class="btn btn-info waves-effect waves-light m-t-10">Submit Form</button>
                          <a href="{{route('location.index')}}" class="btn btn-inverse waves-effect waves-light m-t-10">Cancel</a>
                      </div>
                  </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection