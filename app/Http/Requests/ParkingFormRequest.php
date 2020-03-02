<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;


class ParkingFormRequest extends FormRequest
//class Form extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return false;
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
            'name' => 'required|max:255',
            'price' => 'required|numeric',   //
        ];
    }

    public function messages() 
    {
        return [
            'name.required' => '”名称”は必須項目です。',
            'price.required' => '”30分料金”は必須項目です。',
            'price.numeric' => '”30分料金”の箇所には数字を入力して下さい。',
        ];
    }

    
}
