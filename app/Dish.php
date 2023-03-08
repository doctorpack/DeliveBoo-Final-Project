<?php

namespace App;
use App\Traits\Slugger;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use Slugger;

    public $timestamps = false;

    public function user() {
        return $this->belongsTo('App\User');
    }



    public function orders() {
        return $this->belongsToMany('App\Order');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
