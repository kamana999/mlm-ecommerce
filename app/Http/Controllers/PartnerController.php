<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Item;
use App\Models\Banner;

use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index(){
        return view('partner.home');
    }
    public function ecommerce(){
        $data = [
            'categories'=>Category::all(),
            'banners'=>Banner::all(),
            'products'=>Item::all(),
        ];
        return view('home', $data);
    }
}
