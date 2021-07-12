<ul>
@foreach($children as $child)
	<li>
    <a href="" style="text-transform: uppercase;"><img src="{{url('upload/'.$category->image)}}" alt="">{{ $child->first_name }}</a>
	@if(count($child->children))
            @include('admin.manageChild',['children' => $child->children])
        @endif
	</li>
@endforeach
</ul>