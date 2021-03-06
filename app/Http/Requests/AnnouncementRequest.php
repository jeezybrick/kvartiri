<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AnnouncementRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             'price' => 'required|max:100000000|numeric',
            'description' => 'required|max:2000',
            'street' => 'required|max:50',
            'area' => 'required',
            'space' => 'required|max:1000|numeric',
            'currency' => 'required',
            'image' => 'required',
        ];
    }
}
