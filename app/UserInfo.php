<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{

    protected $fillable = ['first_name', 'last_name', 'city_id','phone','user_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
