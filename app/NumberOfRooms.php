<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NumberOfRooms extends Model
{
    
    protected $table = 'numberofrooms';
    
    protected $fillable = ['number'];
    
    public $timestamps = false;
    
      public function property(){
        return $this->hasMany('App\Property');
    }
}
