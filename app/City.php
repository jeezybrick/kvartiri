<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
     protected $table = 'city';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    public $timestamps = false;
    protected $fillable = ['city'];
    
      public function property(){
        return $this->hasMany('App\Property');
    }
}
