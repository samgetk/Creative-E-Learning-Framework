<?php

namespace CEF\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageValidator extends FormRequest
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
            'page_name'=>'required|string|regex:/^[A-Za-z\_]+$/',
            'page_content'=>'required',
        ];
    }
}
