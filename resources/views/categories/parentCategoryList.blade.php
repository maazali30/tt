, {{ $parentcategories->name }}

@if($parentcategories->parent)
	@include('categories.parentCategoryList',['parentcategories' => $parentcategories->parent])
@endif