<ol>
	@foreach($sublocations as $sublocation)
    <li>
    	{{$sublocation->name}}
    	<form action="{{route('location.edit',[$sublocation->id])}}" method="POST" style="display: inline-block;">
	       @method('PUT')
	       @csrf
	       <button class="btn btn-info btn-xs" type="submit" style="background: none;
    border: none;
    color: black;
    text-decoration: underline;"><i class="fa fa-trash-o" title="Edit"></i>Edit</button>         
	      </form>

	      <form action="{{route('location.destroy',[$sublocation->id])}}" method="POST" style="display: inline-block;">
	       @method('DELETE')
	       @csrf
	       <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs" type="submit"  style="background: none;
    border: none;
    color: black;
    text-decoration: underline;"><i class="fa fa-trash-o" title="Delete"></i>Delete</button>         
	      </form>
	  @if(count($sublocation->childs))
	    @include('locations.subLocationList',['sublocations' => $sublocation->childs])
	  @endif
    </li>
	@endforeach
</ol>