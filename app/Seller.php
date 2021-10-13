<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $fillable = [
        'name', 'name2', 'address', 'nip', 'regon', 'zipcode', 'city', 'bank', 'bro'
    ];
}
