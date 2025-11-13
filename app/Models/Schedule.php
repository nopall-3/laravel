<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use SoftDeletes;
    protected $fillable = ['cinema_id','movie_id','hours','price'];

    protected function casts() : array
    {
        return [
            'hours'=>'array'
        ];
    }

    public function cinema(){
        //panggil realasi dengan belongs to

        return $this->belongsTo(Cinema::class);
    }
    public function movie(){
        //panggil realasi dengan belongs to

        return $this->belongsTo(Movie::class);
    }
}
