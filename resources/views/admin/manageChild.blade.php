<ul>
@foreach($children as $child)
	<li>
    <a href="">
        <p>100{{$child->id}}</p>
        {{ $child->first_name }}</a>
	    @if(count($child->children))
            @include('admin.manageChild',['children' => $child->children])
        @endif
	</li>
@endforeach
</ul>