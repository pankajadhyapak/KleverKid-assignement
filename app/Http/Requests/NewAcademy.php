<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class NewAcademy extends Request
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
            "user_name" => "required",
            "academy_name" => "required|alpha",
            "timeslots" => "required",
            "email" => "required|email",
            "phone" => "required|min:10|max:10",
            "tags" => "required",
            "description" => "required",
            "latitude" => "required|numeric",
            "longitude" => "required|numeric|unique:academies,longitude,NULL,id,latitude,".$this->get('latitude'),
        ];
    }
}
