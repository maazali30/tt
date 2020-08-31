@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 15px;">
  <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title">List of Tasks <a href="{{route('task.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Create New </a></h4>
                  <div class="table-responsive m-t-40">
                      <table id="myTable" class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th>Task#</th>
                                  <th>Start Date</th>
                                  <th>End Date</th>
                                  <th>Description</th>
                                  <th>Employee</th>
                                  <th>Product</th>
                                  <th>Domain</th>
                                  <th>Location</th>
                                  <th>Actions</th>
                              </tr>
                          </thead>
                          <tbody>
                              @if(count($tasks))
                                  @foreach($tasks as $task)
                                  <tr>
                                      <td>{{ $task->id }}</td>
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
                                      <td>{{ $task->description }}</td>
                                      <td>
                                          @foreach($task->employees as $employee)
                                            <span>{{ $employee->name }}</span>
                                          @endforeach
                                      </td>
                                      <td>
                                          <!-- <img src="{{ asset('public/storage/images/inventory/'.$task->product->avatar) }}" width="50" height="50" alt="" style="border-radius: 50%;"> -->

                                          {{ $task->product->name }}
                                      </td>
                                      <td>
                                          @foreach($task->product->categories as $category)
                                              {{ $category->name }}
                                          @endforeach
                                      </td>
                                      <td>
                                        {{ $task->product->location->name }}
                                      </td>
                                      <td>
                                          
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
