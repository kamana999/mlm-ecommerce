@extends('partner.base')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="container">
                <div class="row">
                @foreach($sponsr as $s)
                    @if(count($s->children))
                        @foreach($s->children as $child)
                        {{ $child->first_name }}</a>
                        @endforeach
                    @endif

                @endforeach
                <ul>
                            @foreach($sponsr as $category)
                                <li>
                                    
                                        
                                        @if(count($category->children))
                                            @include('admin.manageChild',['children' => $category->children])
                                        @endif
                                    
                                </li>
                            @endforeach
                        </ul>
                </div>
            </div>
        </div>
    </div>
@endsection