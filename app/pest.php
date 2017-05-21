<?php

namespace LilyFlower;

use Illuminate\Database\Eloquent\Model;

class pest extends Model
{
    //
    public function photodetails()
    {
        return $this->belongsToMany('LilyFlower\photodetail');
    }
}
