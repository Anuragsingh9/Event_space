<?php

namespace App\Http\Requests;
use App\Rules\Alpha;

use Illuminate\Foundation\Http\FormRequest;

class EventSpace extends FormRequest
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
            'space_name'=>['required','min:10','max:40',new Alpha],
            'space_short_name'=>['required','min:10','max:40',new Alpha],
            'space_mood'=>['required','min:10','max:40',new Alpha],
            'max_capacity'=>'required|numeric|min:10|max:20',
            'space_image_url'=>'required|url',
            'space_icon_url'=>'required|url',
            'is_vip_space'=>'required|numeric|min:10|max:20',
            'opening_hours'=>'required',
            'event_id'=>'required|numeric|min:10|max:20',
            'tags'=>['required','min:10','max:40',new Alpha],

        ];
    }
}
