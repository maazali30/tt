@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 15px;">
  <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title">Edit Product Details</h4>
                  <form class="needs-validation" method="post" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data" data-parsley-validate novalidate>
                    <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-sm-3 text-right control-label col-form-label">Product Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Product Name" value="{{ Request::old('name') ?: $product->name }}" required>
                            @if ($errors->has('name'))
                              <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description" class="col-sm-3 text-right control-label col-form-label">Product Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="description" name="description" placeholder="Enter Product Description" required>{{ Request::old('description') ?: $product->description }}</textarea>
                            @if ($errors->has('description'))
                              <span class="help-block">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row {{ $errors->has('avatar') ? ' has-error' : '' }}">
                        <label for="avatar" class="col-sm-3 text-right control-label col-form-label">Product Photo</label>
                        <div class="col-sm-9">
                            <input type="file" id="avatar" name="avatar">

                            @if ($errors->has('avatar'))
                              <span class="help-block">{{ $errors->first('avatar') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group row {{ $errors->has('category_id') ? ' has-error' : '' }}">
                        <label for="category_id" class="col-sm-3 text-right control-label col-form-label">Product Domain</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="category_id" name="category_id[]" multiple="multiple">
                                @if(count($productCategories))
                                  @foreach($productCategories as $row)
                                    <option value="{{ $row->id }}"

                                      @if(in_array($row->id, $currentCats))
                                        selected="selected"
                                        @endif

                                      >{{$row->name}}</option>
                                  @endforeach
                                @endif
                            </select>
                            @if ($errors->has('category_id'))
                            <span class="help-block">{{ $errors->first('category_id') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row {{ $errors->has('location_id') ? ' has-error' : '' }}">
                        <label for="location_id" class="col-sm-3 text-right control-label col-form-label">Product Location</label>
                        <div class="col-sm-9">
                            
                            <select class="form-control" id="location_id" name="location_id">
                              

                                @if(count($productLocations))
                                  @foreach($productLocations as $row)
                                    <option value="{{ $row->id }}"

                                        {{ $row->id == $product->location_id ? 'selected="selected"' : ''}}

                                        >
                                        {{$row->name}}
                                    </option>
                                  @endforeach
                                @endif
                            </select>
                            @if ($errors->has('location_id'))
                            <span class="help-block">{{ $errors->first('location_id') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group m-b-0">
                      <div class="offset-sm-3 col-sm-9">
                          <input type="hidden" name="_token" value="{{ Session::token() }}">
                          <button type="submit" class="btn btn-info waves-effect waves-light m-t-10">Update Inventory</button>
                          <a href="{{route('product.index')}}" class="btn btn-inverse waves-effect waves-light m-t-10">Cancel</a>
                      </div>
                  </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection