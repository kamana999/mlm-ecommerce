<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','ordered','coupon_id'];
    public function orderitem()
    {
        return $this->hasMany('App\Models\OrderItem');
    }
    public function coupon()
    {
        return $this->hasOne('App\Models\Coupon', 'id', 'coupon_id');
    }
    public function delivery_boy(){
        return $this->hasOne('App\Models\Delivery_Person', 'id', 'delivery_boy_id');
    }
    public function address(){
        return $this->hasOne('App\Models\Address','id','address_id');
    }
    public function areas(){

        return $this->hasOne('App\Models\Area');
    }
}
