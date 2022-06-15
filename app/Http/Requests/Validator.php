<?php

namespace CEF\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Validator extends FormRequest
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
            'project_name'=>'required|string|regex:/^[A-Za-z\_]+$/',
            'institution_name'=>'required|string',
            'logo'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }
}
