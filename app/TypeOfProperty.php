<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeOfProperty extends Model
{
     protected $table = 'typeofproperty';
    
    protected $fillable = ['type'];
    
    public $timestamps = false;
    
      public function property(){
        return $this->hasMany('App\Property');
    }
}
