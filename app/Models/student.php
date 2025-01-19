<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // protected $dates = ['deleted_at'];

    public function jurusan(){
        return $this->belongsTo(jurusan::class,'jurusan_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
