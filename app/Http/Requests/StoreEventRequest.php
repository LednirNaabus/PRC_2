<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreEventRequest extends FormRequest
{
    public function rules()
    {
        return [
            'client_id'                 => ['integer','required',],
            'title'                     => ['string','required','min:5','max:100',],
            'start'                     => ['string','required','max:10',],
            'end'                       => ['string','required','max:10',],
        ];
    }

    public function authorize()
    {
        return true;
    }
}