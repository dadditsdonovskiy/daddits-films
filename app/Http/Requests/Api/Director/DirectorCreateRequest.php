<?php

namespace App\Http\Requests\Api\Director;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class DirectorCreateRequest
 */
class DirectorCreateRequest extends FormRequest
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
        $lastname = $this->lastname;
        $date = $this->birthdayDate;
        $unique = Rule::unique('directors','firstname')
            ->where('lastname',$lastname)
            ->where('birthday_date',$date);
        return [
            'firstname' => ['required', 'string', $unique],
            'lastname' => ['required', 'string'],
            'birthdayDate' => ['required', 'date'],
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'firstname.unique' => 'Not unique combination of firstname, lastname and birthdate',
        ];
    }
}
