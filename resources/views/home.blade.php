@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 20px">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><!-- {{ __('Dashboard') }} --> {{ __('You are logged in!') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h3 class="card-title">Recent Tasks</h3>
                                    </div>
                                    <!-- <div class="ml-auto d-flex no-block align-items-center">
                                        <div class="dl">
                                            <select class="custom-select">
                                                <option value="0">Daily</option>
                                                <option value="1" selected="">Weekly</option>
                                                <option value="2">Monthly</option>
                                                <option value="3">Yearly</option>
                                            </select>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="table-responsive">
                                    @if(count($tasks))
                                    <table class="table no-wrap v-middle">
                                        <thead>
                                            <tr class="border-0">
                                                <th class="border-0">Employee</th>
                                                <th class="border-0">Task Description</th>
                                                <th class="border-0">Start Date</th>
                                                <th class="border-0">End Date</th>
                                                <th class="border-0">Location</th>
                                                <th class="border-0">Status</th>
                                                <th class="border-0">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($tasks as $task)
                                            <tr>
                                                <td>
                                                    <div class="d-flex no-block align-items-center">
                                                        <div class="mr-2"><img src="images/user.jpg" alt="user" class="rounded-circle" width="45"></div>
                                                        <div class="">
                                                            @foreach($task->employees as $employee)
                                                              <h5 class="mb-0 font-16 font-medium">{{ $employee->name }}</h5>
                                                              <span>{{ $employee->phone }}</span>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $task->description }}</td>
                                                <td>{{ $task->created_at }}</td>
                                                <td>
                                                @if($task->completed_at == NULL)

                                                  <form action="{{route('task.completed',[$task->id])}}" method="POST" style="display: inline-block;">
                                                   @method('PUT')
                                                   @csrf
                                                   <button onclick="return confirm('Are you sure?')" class="btn btn-success btn-xs" type="submit" style="width: 64px;"><i class="fa fa-trash-o" title="Completed"></i> Complete </button>
                                                  </form>
                                                @else
                                                  {{ $task->completed_at }}
                                                  @endif
                                                </td>
                                                <td>{{ $task->product->location->name }}</td>
                                                <td>
                                                    @if($task->completed_at == NULL)
                                                        {{ __('Pending') }}
                                                    @else
                                                        {{ __('Completed') }}
                                                    @endif
                                                </td>
                                                <td class="blue-grey-text  text-darken-4 font-medium">

                                                    <form action="{{route('task.edit',[$task->id])}}" method="POST" style="display: inline-block;">
                                                       @method('PUT')
                                                       @csrf

                                                        <button class="btn btn-info btn-xs" type="submit"><i class="fa fa-trash-o" title="Edit"></i> Edit </button>
                                                    </form>

                                                    <form action="{{route('task.destroy',[$task->id])}}" method="POST" style="display: inline-block;">
                                                       @method('DELETE')
                                                       @csrf
                                                        <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o" title="Delete"></i> Delete </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @else
                                        <p>No tasks found</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
