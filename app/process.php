<?php

namespace LilyFlower;

use Illuminate\Database\Eloquent\Model;

class process extends Model
{
    //
    public function photodetail(){
        return $this->hasMany(photodetail::class);
    }
}