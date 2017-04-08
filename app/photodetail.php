<?php

namespace LilyFlower;

use Illuminate\Database\Eloquent\Model;

class photodetail extends Model
{
    //

    public function procces(){
        return $this->belongsTo(process::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function address(){
        return $this->belongsTo(address::class);
    }


}