<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateCompanyRequest extends FormRequest
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
            'name'             => ['string','required','min:5','max:100',],
            'address'          => ['string','required','min:5',],
            'zip'              => ['nullable',],
            'sss'              => ['nullable',],
            'phic'             => ['nullable',],
            'hdmf'             => ['nullable',],
            'tin'              => ['nullable',],
            'rdo'              => ['nullable',],
            'employer_type'    => ['nullable',],
            'hdmf_code'        => ['nullable',],
            'contact_person'   => ['nullable','max:100',],
            'telephone_number' => ['nullable','max:100',],
            'fax_number'       => ['nullable','max:100',],
            'mobile_number'    => ['nullable','max:100',],
            'email'            => ['nullable','max:100',],
        ];
    }
}
