<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
    use HasFactory;

    /* 
    Menggunakakan protected $guarded, agar dapat melakukan Mass Assignment kecuali field 'id'

    Bisa juga menggunakan protected $fillable = ['field_1','field_2','field_n']
    untuk menentukan field mana saja yang bisa diisi melalui Mass Assigment
    */
    protected $guarded = ['id'];

    public function payments(){
        return $this->hasMany(Payment::class, 'payment_type_id', 'id');
    }

    public function transactions(){
        return $this->hasMany(Transaction::class, 'payment_type_id', 'id');
    }

    public function services(){
        return $this->hasMany(Service::class, 'payment_type_id', 'id');
    }
}
