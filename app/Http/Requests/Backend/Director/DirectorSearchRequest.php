<?php

namespace App\Http\Requests\Backend\Director;

use Illuminate\Foundation\Http\FormRequest;

class DirectorSearchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !auth()->guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'perPage' => ['integer', 'max:10000'],
            'page' => ['integer'],
            //'id' => ['required'],
            'firstname' => ['string', 'nullable'],
            'filmsCount' => ['integer', 'nullable']
        ];
    }

    public function messages()
    {
        return [
            'filmsCount.integer' => 'Count should be an integer',
        ];
    }
}
