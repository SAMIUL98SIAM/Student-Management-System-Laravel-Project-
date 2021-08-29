<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
                'username'=> 'required',
                'password'=> 'required|min:5',
                'email'=> 'required',
                'phone'=> 'required|min:11|max:11',
                'image'=> 'required' 

        ];
    }
    public function messages()
    {
        return 
        [
          'username.required' => 'username Required.....',
          'password.required' => 'password required....',
          'phone.required' => 'phone required', 
          'email.required'=> 'Email required',
          'image.required'=> 'Plesae attach Student Picture'
        ];
    }
}
