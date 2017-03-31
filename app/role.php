<?php

namespace LilyFlower;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    //
    public function user(){
    	return $this->hasMany(User::class);
    }
}
