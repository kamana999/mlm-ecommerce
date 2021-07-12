<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = 'addresses';
    protected $fillable = ['name','user_id', 'street', 'country_id','state_id','district_id','area_id','contact','contact2'];
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
