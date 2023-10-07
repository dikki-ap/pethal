<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /* 
    Menggunakakan protected $guarded, agar dapat melakukan Mass Assignment kecuali field 'id'

    Bisa juga menggunakan protected $fillable = ['field_1','field_2','field_n']
    untuk menentukan field mana saja yang bisa diisi melalui Mass Assigment
    */
    protected $guarded = ['id'];

    protected $with = ['product_type'];

    public function product_type(){
        return $this->belongsTo(ProductType::class);
    }

    public function galleries(){
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function transactions(){
        return $this->hasMany(Transaction::class, 'product_id', 'id');
    }
}
