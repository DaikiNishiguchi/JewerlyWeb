<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateData extends FormRequest
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
            'file_name'=>'required',
            'name'=>'required',
            'stock'=>'required|regex:/^[0-9]+$/i',
            'price'=>'required|regex:/^[0-9]+$/i',
            'comment'=>'required',
        ];
    }
}
