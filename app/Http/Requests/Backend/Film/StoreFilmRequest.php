<?php

namespace App\Http\Requests\Backend\Film;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class StoreFilmRequest.
 */
class StoreFilmRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $oldest = Carbon::createFromDate(1900, 1, 1);
        $newest = Carbon::createFromDate(2022, 12, 31);
        return [
            'title' => ['required', 'string', 'min:3', 'max:20'],
            'description' => ['required', 'string', 'min:5', 'max:200'],
            'releasedDate' => 'required|date|after:' . $oldest . '|before:' . $newest,
            'directors' => ['required', 'exists:directors,id']
        ];
    }
}
