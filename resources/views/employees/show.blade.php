
@extends('layouts.app')

@section('content')
<div class="container inventory-detail-page" style="margin-top: 20px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header"><h4>Employee Details</h4></div>
            <div class="card-body">
                <div class="section">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-bold">Employee Name:</label>
                        <div class="col-sm-9">
                            <div class="detail"><label class="col-form-label">{{ $employee->name }}</label></div>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-bold">Employee Description:</label>
                        <div class="col-sm-9">
                            <div class="detail"><label class="col-form-label">{{ $employee->description }}</label></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-bold">Employee Domain:</label>
                        <div class="col-sm-9">
                            <div class="detail">
                                <label class="col-form-label">
                                    <ol>
                                        @foreach($employee->categories as $category)
                                            <li>{{ $category->name }}</li>
                                        @endforeach
                                    </ol>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-bold">Employee Designation:</label>
                        <div class="col-sm-9">
                            <div class="detail">
                                <label class="col-form-label">
                                    {{ $employee->designation }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-bold">Employee Phone:</label>
                        <div class="col-sm-9">
                            <div class="detail">
                                <label class="col-form-label">
                                    {{ $employee->phone }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-bold">Employee Image:</label>
                        <div class="col-sm-9">
                            <div class="detail"><label class="col-form-label"><img src="{{ asset('public/storage/images/employees/'.$employee->avatar) }}"></label></div>
                        </div>
                    </div>
                </div>

                @foreach($employee->tasks as $task)

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
                        <label class="col-sm-3 col-form-label text-bold">Product Name:</label>
                        <div class="col-sm-9">
                            <div class="detail">
                                <label class="col-form-label">
                                  {{ $task->product->name }}
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
