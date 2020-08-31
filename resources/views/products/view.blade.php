@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 15px;">
  <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title">List of Products <a href="{{route('product.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Create New </a></h4>
                  <div class="table-responsive m-t-40">
                      <table id="myTable" class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>Name</th>
                                  <th>Description</th>
                                  <th>Category</th>
                                  <th>Location</th>
                                  <th>Photo</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              @if(count($products))
                                  @foreach($products as $product)

                                  <tr>
                                      <td>{{ $product->id }}</td>
                                      <td>
                                        <a href="{{route('product.show',$product->id)}}">
                                          {{ $product->name }}
                                        </a>
                                      </td>
                                      <td>{{ $product->description }}</td>
                                      <td>
                                            @foreach($product->categories as $category)


                                                {{ $category->name }}

                                                @if($category->parent)
                                                  @include('categories.parentCategoryList',['parentcategories' => $category->parent])
                                                @endif

                                            @endforeach
                                      </td>
                                      <td>
                                          {{ $product->location->name  }}
                                          
                                          @if($product->location->parent)
                                            @include('locations.parentLocationList',['parentlocations' => $product->location->parent])
                                          @endif
                                          
                                      </td>
                                      <td><img src="{{ asset('public/storage/images/inventory/'.$product->avatar) }}" width="50" height="50" alt=""></td>
                                      <td>
                                          
                                          <form action="{{route('product.edit',[$product->id])}}" method="POST" style="display: inline-block;">
                                           @method('PUT')
                                           @csrf
                                           <button class="btn btn-info btn-xs" type="submit"><i class="fa fa-trash-o" title="Edit"></i> Edit </button>         
                                          </form>

                                          <form action="{{route('product.destroy',[$product->id])}}" method="POST" style="display: inline-block;">
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
