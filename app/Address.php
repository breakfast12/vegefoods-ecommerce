<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresss';
    protected $primaryKey = 'id_address';
     protected $fillable = ['id_payment', 'id_user', 'address', 'country', 'city', 'postcode', 'province'];

     public function payment() {
     	return $this->belongsTo('App\Payment', 'id_payment');
     }
}
