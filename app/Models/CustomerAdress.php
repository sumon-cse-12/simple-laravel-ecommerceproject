<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAdress extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id','first_name', 'last_name', 'email', 'address','city', 'mobile'
    ];
}
