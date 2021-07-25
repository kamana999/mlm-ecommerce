<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['cat_title', 'description', 'image','parent_id'];

    public function children()
    {
        return $this->hasMany('App\Models\Category', 'parent_id');
    }
    public function parent() {
        return $this->belongsTo('App\Models\Category', 'parent_id');
    }
    public function items(){
        return $this->hasMany('App\Models\Item');
    }
}
