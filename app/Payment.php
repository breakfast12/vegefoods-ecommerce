<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
	protected $table = 'payments';
    protected $primaryKey = 'id_payment';
    protected $fillable = ['id_user', 'name', 'exp_date', 'cc_number', 'cvv', 'type'];

    public function user() {
    	return $this->belongsTo('App\User');
    }

    public function address()  {
    	return $this->hasOne('App\Address', 'id_payment');
    }

}
