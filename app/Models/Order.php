<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'customer_id','first_name', 'last_name', 'email', 'address','city', 'mobile', 'order_notes','delivery_type','quantity','price','shipping','sub_total','status'
    ];
    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id', 'id')->withDefault();
    }
}
