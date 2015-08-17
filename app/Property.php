<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Input;
use Validator;
use Redirect;
use Session;


use Carbon\Carbon;


class Property extends Model
{
    protected $table = 'announcement';

    protected $fillable = ['price',
        'street',
        'space',
        'description',
        'currency',
        'city_id',
        'number_of_rooms_id',
        'area_id',
        'type_of_property_id'
    ];

    protected $dates = ['created_at'];

    public function creation_time()
    {

        return $this->created_at->diffForHumans();

    }

    public function scopeSearch($query, $input)
    {

        if (array_key_exists("typeofproperty", $input)) {
            $query->where('type_of_property_id', '=', $input['typeofproperty']);
        }

        if (array_key_exists("numofrooms", $input)) {

            $query->where(function ($query) {

                foreach (Input::get('numofrooms') as $value) {

                    $query->orWhere('number_of_rooms_id', '=', $value);

                }

            });

        }

        if (array_key_exists("area", $input)) {
            $query->where('area_id', '=', $input['area']);
        }

        if (array_key_exists("price_ot", $input) and in_array("price_do", $input)) {
            $query->whereBetween('price', [$input['price_ot'], $input['price_do']]);
        }
        if (array_key_exists("currency", $input)) {
            $query->where('currency', '=', $input['currency']);
        }
    }

    public function scopeTime()
    {

        return Carbon::now();
    }

    public function scopeSort($query, $input)
    {
        if (array_key_exists("sortForm", $input)) {
            if ($input['sortForm'] === 'price_down') {
                $query->orderBy('price', 'desc');
            } elseif ($input['sortForm'] === 'price_up') {
                $query->orderBy('price', 'asc');
            } elseif ($input['sortForm'] === 'date') {
                $query->orderBy('created_at', 'desc');
            }
        }

        if (array_key_exists("sortFormDate", $input)) {
            if ($input['sortFormDate'] === 'all_time') {
                $query->orderBy('created_at', 'desc');
            } elseif ($input['sortFormDate'] === 'three_days') {
                $query->where('created_at', '>=', Carbon::yesterday());
            } elseif ($input['sortFormDate'] === 'week') {
                $query->where('created_at', '>=', Carbon::now()->subWeek());
            }
        }
    }

    public function scopeAmount()
    {

        return DB::table('announcement')->count();
    }

    public function scopePublished($query)
    {

        $query->where('created_at', '<=', Carbon::now());
    }

    public function city()
    {

        return $this->belongsTo('App\City');

    }

    public function numberOfRooms()
    {

        return $this->belongsTo('App\NumberOfRooms');

    }

    public function typeOfProperty()
    {

        return $this->belongsTo('App\TypeOfProperty');

    }

    public function area()
    {

        return $this->belongsTo('App\Area');

    }

    public function user()
    {

        return $this->belongsTo('App\User');

    }

    //Метод для сохранения изображений
    public function saveImage($announcement)
    {

        $ext = Input::file('image')->getClientOriginalExtension();

        Storage::put(
            'images/' . $announcement->id . '/' . $announcement->id . '.' . $ext,
            file_get_contents($request->file('image')->getRealPath())
        );

        /* $file = array('image' => Input::file('image'));
         // setting up rules
         $rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
         // doing the validation, passing post data, rules and the messages
         $validator = Validator::make($file, $rules);
         if ($validator->fails()) {
             // send back to the page with the input data and errors
             return Redirect::to('upload')->withInput()->withErrors($validator);
         }
         else {
             // checking file is valid.
             if (Input::file('image')->isValid()) {
                 $destinationPath = 'uploads/'.$announcement->id; // upload path
                 $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
                 $fileName = $announcement->id.'.'.$extension; // renameing image
                 Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
                 // sending back with message
                 Session::flash('success', 'Upload successfully');
             }
             else {
                 // sending back with error message.
                 Session::flash('error', 'uploaded file is not valid');
             }
         }*/

    }

}
