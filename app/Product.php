<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{


	protected $primaryKey = 'id_products';
    protected $fillable = ['name', 'price', 'category', 'image'];
}
