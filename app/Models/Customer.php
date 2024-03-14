<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    protected $fillable = [
   'first_name', 'last_name', 'email', 'password'
    ];
    use HasFactory;
    public function checkouts(){
        return $this->hasMany(Checkout::class);
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }
}
