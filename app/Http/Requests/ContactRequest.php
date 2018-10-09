<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name'=>'required|min:3',
            'email'=>'required|min:4',
            'message'=>'required|min:6'
        
        ];
    }


    public function messages()
    {
        return [
        'name.required' => 'Name field should not be empty',
        'name.min' => 'Name field is too small',
        'email.required' => 'Email should not be empty',
        'email.min' => 'This email is not standard',
        'message.required'=> 'Message box should not be empty',
        'message.min' => 'Message too short',

        ];
    }

}
