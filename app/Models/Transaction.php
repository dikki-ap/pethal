<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    /* 
    Menggunakakan protected $guarded, agar dapat melakukan Mass Assignment kecuali field 'id'

    Bisa juga menggunakan protected $fillable = ['field_1','field_2','field_n']
    untuk menentukan field mana saja yang bisa diisi melalui Mass Assigment
    */
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function product_type(){
        return $this->belongsTo(ProductType::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function payment_type(){
        return $this->belongsTo(PaymentType::class);
    }
}
