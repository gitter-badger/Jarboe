<?php

namespace Yaro\Jarboe\Http\Requests\Navigation;


use Illuminate\Foundation\Http\FormRequest;

class UpdateNodeRequest extends FormRequest
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
            'id'   => 'required',
            'name' => 'required',
            'slug' => 'required',
            'icon' => '',
            'is_active' => '',
        ];
    }
}