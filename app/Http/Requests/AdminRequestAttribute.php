<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequestAttribute extends FormRequest
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
            'atb_name'=>'required|unique:attributes,atb_name,'.$this->id,
            'atb_type'=>'required',
            'atb_category_id'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'atb_name.required' => 'Dữ liệu không được để trống',
            'atb_name.unique' => 'Dữ liệu đã tồn tại',
            'atb_type.required' => 'Dữ liệu không được để trống',
            'atb_category_id.required' => 'Dữ liệu không được để trống',
        ];
    }
}
