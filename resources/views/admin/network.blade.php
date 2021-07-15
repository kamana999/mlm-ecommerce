@extends('admin.base')
@section('content')
<link rel="stylesheet" href="{{asset('style1.css')}}">
    <div class="page-wrapper">
		<div class="page-content">
            <div class="container mt-5">
                        <div class="row">
                            <div class="tree">
                                <!-- <ul>
                                    <li> <a href="#"><img src="images/1.jpg"><span>Child</span></a>
                                    <ul>
                                        <li><a href="#"><img src="images/2.jpg"><span>Grand Child</span></a>
                                        <ul>
                                            <li> <a href="#"><img src="images/3.jpg"><span>Great Grand Child</span></a> </li>
                                            <li> <a href="#"><img src="images/4.jpg"><span>Great Grand Child</span></a> </li>
                                        </ul>
                                    </li>
                                    <li> <a href="#"><img src="images/5.jpg"><span>Grand Child</span></a>
                                    <ul>
                                        <li> <a href="#"><img src="images/6.jpg"><span>Great Grand Child</span></a> </li>
                                        <li> <a href="#"><img src="images/7.jpg"><span>Great Grand Child</span></a> </li>
                                        <li> <a href="#"><img src="images/8.jpg"><span>Great Grand Child</span></a> </li>
                                    </ul>
                                </li>
                                <li><a href="#"><img src="images/9.jpg"><span>Grand Child</span></a></li>
                            </ul>
                        </li>
                    </ul> -->

                    <ul>
                        @foreach($sponsr as $category)
                            <li>
                                <ul>
                                    <a href="">
                                        <img src="{{url('upload/'.$category->image)}}" alt="">
                                            {{ $category->first_name }}
                                    </a>
                                    @if(count($category->children))
                                        @include('admin.manageChild',['children' => $category->children])
                                    @endif
                                </ul>
                            </li>
                        @endforeach
                    </ul>
            </div>
        </div>
    </div>
