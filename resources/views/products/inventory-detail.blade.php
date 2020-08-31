@extends('layouts.app')

@section('content')
<div class="container inventory-detail-page" style="margin-top: 20px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header"><h4>Inventory Details</h4></div>
            <div class="card-body">
                <div class="section">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-bold">Product Name:</label>
                        <div class="col-sm-9">
                            <div class="detail"><label class="col-form-label">{{ $product->name }}</label></div>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-bold">Product Description:</label>
                        <div class="col-sm-9">
                            <div class="detail"><label class="col-form-label">{{ $product->description }}</label></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-bold">Product Domain:</label>
                        <div class="col-sm-9">
                            <div class="detail">
                                <label class="col-form-label">
                                    @foreach($product->categories as $category)

                                        {{ $category->name }}

                                        @if($category->parent)
                                          @include('categories.parentCategoryList',['parentcategories' => $category->parent])
                                        @endif

                                    @endforeach
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-bold">Product Location:</label>
                        <div class="col-sm-9">
                            <div class="detail">
                                <label class="col-form-label">
                                    {{ $product->location->name  }}
                                      
                                    @if($product->location->parent)
                                        @include('locations.parentLocationList',['parentlocations' => $product->location->parent])
                                    @endif
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-bold">Product Image:</label>
                        <div class="col-sm-9">
                            <div class="detail"><label class="col-form-label"><img src="{{ asset('public/storage/images/inventory/'.$product->avatar) }}"></label></div>
                        </div>
                    </div>
                </div>

                @foreach($tasks as $task)

                <hr>

                <div class="section">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-bold">Repair Date:</label>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label col-form-label text-bold">Start Date</label>
                                    <div>{{ $task->created_at }}</div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label col-form-label text-bold">End Date</label>
                                    <div>
                                        @if($task->completed_at == NULL)
                                            {{ __('N/A') }}
                                        @else
                                            {{ $task->completed_at }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-bold">Employee Name:</label>
                        <div class="col-sm-9">
                            <div class="detail">
                                <label class="col-form-label">
                                  @foreach($task->employees as $employee)
                                    {{ $employee->name }}
                                  @endforeach
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-bold">Repair Details:</label>
                        <div class="col-sm-9">
                            <div class="detail">
                                <label class="col-form-label">
                                    {{ $task->description }}
                                </label>
                            </div>
                        </div>
                    </div>    
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
