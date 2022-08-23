<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'last_name'                 => ['nullable',],
            'first_name'                => ['nullable',],
            'middle_name'               => ['nullable',],
            'name'                      => ['string',],
            'client_name'               => ['string','required'],
            'client_address'            => ['nullable','required',],
            'position'                  => ['nullable',],
            'mobile_number'   => [
                'required',
                'unique:users,mobile_number',
            ],
            'email'   => [
                'required',
                'unique:users,email',
            ],
            'password'   => [
                'nullable',
                'string',
            ],
            'registration_status'       => ['string','required'],
            'user_type'                 => ['string','required',],
        ];
    }

    public function authorize()
    {
        return true;
    }
}