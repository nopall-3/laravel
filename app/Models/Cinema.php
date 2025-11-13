<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cinema extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','location'];

    public function schedules(){
        //one to one : hasOne
        //one to many : hasMany

        return $this->hasMany(Schedule::class);
    }
}
