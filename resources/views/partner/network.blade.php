@extends('partner.base')
@section('content')
<link rel="stylesheet" href="{{asset('style1.css')}}">

    <div class="page-wrapper">
		<div class="page-content">
            <div class="container mt-5">
                <div class="row">
                    <div class="tree">
                        <ul>
                            @foreach($sponsr as $category)
                                <li>
                                    
                                        <a href="">
                                            <img src="{{url('upload/'.$category->image)}}" alt="">
                                                {{ $category->first_name }}
                                        </a>
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
    </div>