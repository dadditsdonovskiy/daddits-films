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
     * @var mixed
     */
    private $lastname;
    /**
     * @var mixed
     */
    private $birthdayDate;

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
        $unique = Rule::unique('directors', 'firstname')
            ->where(
            'lastname',
            $this->lastname
        )
            ->where(
                'birthday_date',
                $this->birthdayDate
            );
        return [
            'firstname' => ['required', 'string', $unique],
            'lastname' => ['required', 'string'],
            'birthdayDate' => ['required', 'date'],
        ];
    }

    public function messages()
    {
        return [
            'firstname.unique' => 'Given ip and hostname are not unique',
        ];
    }
}
