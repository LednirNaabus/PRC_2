<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateQuestionRequest extends FormRequest
{
    public function rules()
    {
        return [
            'account_type'              => ['string','required',],
            'category'                  => ['string','required','max:100',],
            'sub_category'              => ['string','nullable','max:100',],
            'question'                  => ['string','required',],
            'required'                  => ['string','required',],
            'option_1'                  => ['string','nullable',],
            'option_2'                  => ['string','nullable',],
            'option_3'                  => ['string','nullable',],
            'option_4'                  => ['string','nullable',],
            'option_5'                  => ['string','nullable',],
            'option_6'                  => ['string','nullable',],
            'option_7'                  => ['string','nullable',],
            'option_8'                  => ['string','nullable',],
            'score_1'                   => ['integer','nullable',],
            'score_2'                   => ['integer','nullable',],
            'score_3'                   => ['integer','nullable',],
            'score_4'                   => ['integer','nullable',],
        ];
    }

    public function authorize()
    {
        return true;
    }
}