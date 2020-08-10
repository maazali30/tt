@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 15px;">
  <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title">List of Locations <a href="{{route('location.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Create New </a></h4>
                  <div class="table-responsive m-t-40">
                      <table id="myTable" class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>Name</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              @if(count($locations))
                                  @foreach($locations as $location)
                                  <tr>
                                      <td>{{ $location->id }}</td>
                                      <td>
                                        <!-- <ul>
                                          <li> -->
                                            {{ $location->name }}

                                            @if(count($location->childs))
                                              @include('locations.subLocationList',['sublocations' => $location->childs])
                                            @endif
                                          <!-- </li>
                                        </ul> -->
                                      </td>
                                      
                                      <td>
                                          
                                          <form action="{{route('location.edit',[$location->id])}}" method="POST" style="display: inline-block;">
                                           @method('PUT')
                                           @csrf
                                           <button class="btn btn-info btn-xs" type="submit"><i class="fa fa-trash-o" title="Edit"></i> Edit </button>         
                                          </form>

                                          <form action="{{route('location.destroy',[$location->id])}}" method="POST" style="display: inline-block;">
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
