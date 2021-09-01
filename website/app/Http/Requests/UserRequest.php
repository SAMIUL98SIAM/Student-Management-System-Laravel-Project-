<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
                'email'=> 'required',
                'password'=> 'required|min:5',
                'type'=>'required', 
                'active'=>'required'

        ];
    }
    public function messages()
    {
        return 
        [
          'email.required'=> 'Email required',
          'password.required' => 'password required....',
          'type.required' => 'Type required',
          'active.required'=> "Please wait untill you aren't selected"
        ];
    }
}
