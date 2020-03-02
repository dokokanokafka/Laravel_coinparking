<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class PriceDiffRequest extends FormRequest
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
            // 'date' => 'after:date'
            'end_datetime' => 'after:start_datetime'
        ];
    }

    public function messages() {
        return [
            // 'date.after:date' => '”いつまで”をご確認ください',
            'end_datetime.after:start_datetime' => '”いつまで”をご確認ください',
        ];
    }
    /*return [
        'start_date' => 'required|date_format:Y-m-d',
        'start_time' => 'required|date_format:H:i',
        'end_date' => 'required|date_format:Y-m-d',
        'end_time' => [
          'required',
          'date_format:H:i',
          function($attribute, $value, $fail) {
            $start_datetime = Carbon::parse($this->start_date.' '.$this->start_time);
            $end_datetime = Carbon::parse($this->end_date.' '.$this->end_time);
            if ($end_datetime <= $start_datetime) {
              $fail('終了日時は開始日時より後にしてください。');
            }
          },
        ],
      ];*/

}
