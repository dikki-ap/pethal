<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

    /* 
    Menggunakakan protected $guarded, agar dapat melakukan Mass Assignment kecuali field 'id'

    Bisa juga menggunakan protected $fillable = ['field_1','field_2','field_n']
    untuk menentukan field mana saja yang bisa diisi melalui Mass Assigment
    */
    protected $guarded = ['id'];

    public function schedules(){
        return $this->hasMany(Schedule::class, 'day_id', 'id');
    }
}
