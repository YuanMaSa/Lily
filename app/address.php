<?php

namespace LilyFlower;

use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    //
    public function user(){
        return $this->belongsTo(User::class);
    }
}
