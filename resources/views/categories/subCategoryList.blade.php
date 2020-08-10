 <ol>
	@foreach($subcategories as $subcategory)
    <li>
    	{{$subcategory->name}}

    	<form action="{{route('category.edit',[$subcategory->id])}}" method="POST" style="display: inline-block;">
	       @method('PUT')
	       @csrf
	       <button class="btn btn-info btn-xs" type="submit" style="background: none;
    border: none;
    color: black;
    text-decoration: underline;"><i class="fa fa-trash-o" title="Edit"></i>Edit</button>         
	      </form>

	      <form action="{{route('category.destroy',[$subcategory->id])}}" method="POST" style="display: inline-block;">
	       @method('DELETE')
	       @csrf
	       <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs" type="submit"  style="background: none;
    border: none;
    color: black;
    text-decoration: underline;"><i class="fa fa-trash-o" title="Delete"></i>Delete</button>         
	      </form>

	      @if(count($subcategory->childs))
		    @include('categories.subCategoryList',['subcategories' => $subcategory->childs])
		  @endif

    </li>
@endforeach
</ol>