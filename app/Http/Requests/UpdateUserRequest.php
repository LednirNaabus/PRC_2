<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'last_name'                 => ['nullable',],
            'first_name'                => ['nullable',],
            'middle_name'               => ['nullable',],
            'name'                      => ['string',],
            'client_name'               => ['string','required',],
            'position'                  => ['nullable',],
            'mobile_number'             => ['nullable','string','min:11',],
            'email'   => [
                'required',
                'unique:users,email,' . request()->route('user')->id,
            ],
            'user_type'                 => ['string','required',],
        ];
    }

    public function authorize()
    {
        return true;
    }
}