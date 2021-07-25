<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;
    public function children()
    {
        return $this->hasMany('App\Models\Partner', 'parent_id', 'id');
    }
    public function parent() {
        return $this->belongsTo('App\Models\Partner', 'parent_id');
    }

    public function country(){
        return $this->belongsTo('App\Models\Country');
    }
    public function state(){
        return $this->belongsTo('App\Models\State');
    }public function district(){
        return $this->belongsTo('App\Models\District');
    }
    public function area(){
        return $this->belongsTo('App\Models\Area');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
