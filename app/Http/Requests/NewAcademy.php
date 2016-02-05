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
            "academy_name" => "required",
            "timeslots" => "required",
            "email" => "required",
            "phone" => "required",
            "tags" => "required",
            "description" => "required",
            "latitude" => "required",
            'longitude' => "required"
        ];
    }
}
