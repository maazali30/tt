, {{ $parentlocations->name }}

@if($parentlocations->parent)
	@include('locations.parentLocationList',['parentlocations' => $parentlocations->parent])
@endif