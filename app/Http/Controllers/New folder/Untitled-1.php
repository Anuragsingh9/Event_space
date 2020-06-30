<?php

namespace App\Http\Requests;
use pebibits\validation\Rule\Rules\Pincode;
use pebibits\validation\Rule\Adhar\Adhar;
use pebibits\validation\Rule\ColorName\ColorName;
use pebibits\validation\Rule\Alpha\Alpha;

use pebibits\validation\Rules\Alphanumeric;

use Illuminate\Foundation\Http\FormRequest;

class Formvalidate extends FormRequest
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
            'keepcontact_page_title'=>'required|string|min:10|max:25',
            'keepcontact_page_description'=>'required|string|min:40|max:100',
            'keepcontact_page_logo'=>'required|image|mimes:jpeg,png,jpg',
            'website_page_link'=>'required|url',
            'twitter_page_link '=>'required|url',
            'linkedin_page_link '=>'required|url',
            'facebook_page_link'=>'required|url',
            'instagram_page_link'=>'required|url',
             /////////// Color Validation\\\\\\\\\\\\
            'main_background_color'=>['required',new ColorName],
            'main_background_color_value'=>'required|numeric|min:0|max:100',
            'texts_color'=>['required',new ColorName],
            'texts_color_value'=>'required|numeric|min:0|max:100',
            'keep_contact_color1' => ['required',new ColorName],
            'keep_contact_color1_value' => 'required|numeric|min:0|max:100',
            'keepontact_color_2'=>['required',new ColorName],
            'keepcontact_color_2_value'=>'required|numeric|min:0|max:100',
            'keepcontact_selected_space_color'=>['required',new ColorName],
            'keepcontact_selected_space_color_value'=>'required|numeric|min:0|max:100',
            'keepcontact_background_color_1'=>['required',new ColorName],
            'keepcontact_background_color_1_value'=>'required|numeric|min:0|max:100',
            'keepcontact_background_color_2'=>['required',new ColorName],
            'keepcontact_background_color_2_value'=>'required|numeric|min:0|max:100',
            'keepcontact_selected_space_color'=>['required',new ColorName],
            'keepcontact_selected_space_color_value'=>'required|numeric|min:0|max:100',
            'keepcontact_unselected_space_color'=>['required',new ColorName],
            'keepcontact_unselected_space_color_value'=>'required|numeric|min:0|max:100',
            'keepcontact_closed_space_color'=>['required',new ColorName],
            'keepcontact_closed_space_color_value'=>'required|numeric|min:0|max:100',
            'keepcontact_text_space_color'=>['required',new ColorName],
            'keepcontact_text_space_color'=>'required|numeric|min:0|max:100',
            'keepcontact_names_color'=>['required',new ColorName],
            'keepcontact_names_color_value'=>'required|numeric|min:0|max:100',
            'keepcontact_thumbnails_color'=>['required',new ColorName],
            'keepcontact_thumbnails_color_value'=>'required|numeric|min:0|max:100',
            'keepcontact_countdown_background_color'=> ['required',new ColorName],
            'keepcontact_countdown_background_color'=>'required|numeric|min:0|max:100',
            'keepcontact_countdown_text_color'=>['required',new ColorName],
            'keepcontact_countdown_text_color'=>'required|numeric|min:0|max:100',
            /////////KeepContact section Texts Validation\\\\\\\\\\
            'Reply_text'=>['required','min:30','max:80',new Alpha],
            'keepcontact_section_line1'=>['required','min:30','max:80',new Alpha],
            'keepcontact_section_line2'=>['required','min:30','max:80',new Alpha],
            ///////// EVENT IN BLUE JEANS Validation \\\\\\\\\\
            'event_name'=>['required','min:3','max:8',new Alpha],
            'start_datetime'=>'required|date|date_format:Y-m-d',
            'end_datetime'=>'required|date|date_format:Y-m-d|after:start_datetime',
            'event_chat'=>'required|in:O,1',
            'attendee_search'=>'required|in:O,1',
            'event_Q&A'=>'required|in:1',
            'allow_anonymous_questions'=>'required|in:0',
            'auto_approve_questions'=>'required|in:0',
            'auto_recording'=>'required|in:1',
            'phone_dial_in'=>'required|in:0',
            'raise_hand'=>'required|in:1',
            'display_attendee_count'=>'required|in:0',
            ///////// SPACES MANAGEMENT Validation \\\\\\\\\\
            'space_name'=>['required','min:30','max:80',new Alpha],
            'space_short_name'=>['required','min:30','max:80',new Alpha],
            'space_mood'=>['required','min:30','max:80',new Alpha],
            'max_capacity'=>'required|numeric|min:200|max:400',
            'space_image'=>'image|mimes:jpeg,png,jpg|max:2048',
            'space_icon'=>'image|mimes:jpeg,png,jpg|max:2048',
            'opening_hours'=>'date_format:H:i',
            /////////Registration Form Validation\\\\\\\\\\
            'learn_title'=>['required','min:50','max:200',new Alpha],
            ///////// PARTICIPANTS MANAGEMENT Validation\\\\\\\\\\
            'presenter'=>'required_without:moderator|nullable',
            'moderator'=>'required_without:presenter||nullable',
            ///////// REGISTRATION OF A SPECIFIC EVENT Validation\\\\\\\\\\
            'customfield_1'=>['nullable',new Alpha],
            'customfield_2'=>['nullable',new Alpha],
            'customfield_3'=>['nullable',new Alpha]

            


            




        ];
    }
}