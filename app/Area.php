<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
        protected $table = 'area';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    public $timestamps = false;
    protected $fillable = ['name'];
    
      public function property(){
        return $this->hasMany('App\Property');
    }
}
