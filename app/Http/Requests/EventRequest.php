<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'title' => 'required|max:255',
            'content' => 'required',
            'user_id' => '',
            'category_id' => 'required|numeric',
            'image' => 'required|file|image|max:3000' 
        ];
    }

    public function messages()
    {
        return [
            'title' => 'required|max:255',
            'content' => 'required',
            'user_id' => '',
            'category_id' => 'required|numeric',
            'image.max' => '3MB以下にしてください' 
        ];
    }
}
 