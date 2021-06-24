<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'image','title','description','weight','price','discount_price','parent_id'];
    
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
    public function children()
    {
        return $this->hasMany('App\Models\Category', 'parent_id');
    }
}
