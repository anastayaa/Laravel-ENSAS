<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FiliereRequest extends FormRequest
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
            'titre' => 'bail|required|string|max:50|unique:filieres',
            'image' => 'bail|required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
