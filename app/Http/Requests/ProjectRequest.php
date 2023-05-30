<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:200|unique:projects',
            'description' => 'required|max:200',
            'thumb' => 'required|image|max:1024',
            'type' => 'required|exists:types,id',
            'technologies' => 'exists:technologies,id'
        ];
    }


    public function messages(){
        return[
            'name.required' => 'Il campo Project Name non può essere vuoto',
            'description.required' => 'Il Description non può essere vuoto',
            'thumb.required' => 'Il campo Thumbnail non può essere vuoto',
            'type.required' => 'Il campo Project Type non può essere vuoto',
            'type.exists:types' => 'Il campo Project Type non è corretto'
        ];
    }

}
