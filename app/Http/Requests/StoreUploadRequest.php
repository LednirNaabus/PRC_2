<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreUploadRequest extends FormRequest
{
    public function rules()
    {
        return [
            'client_id'                 => ['required',],
            'category'                  => ['string','required',],
            'comment'                   => ['string','required',],
            'url'                       => ['string','required',],
        ];
    }

    public function authorize()
    {
        return true;
    }
}