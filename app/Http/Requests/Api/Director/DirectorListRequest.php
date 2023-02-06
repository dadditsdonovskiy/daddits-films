<?php

namespace App\Http\Requests\Api\Director;

use App\Http\Requests\Api\FormRequest;

/**
 * Class DirectorListRequest
 */
class DirectorListRequest extends FormRequest
{
    public const SORT_BY_CREATED_AT_ASC = 'createdAt';
    public const SORT_BY_CREATED_AT_DESC = '-createdAt';
    public const SORT_BY_FIRST_NAME_ASC = 'firstname';
    public const SORT_BY_FIRST_NAME_DESC = '-firstname';
    public const SORT_BY_LAST_NAME_ASC = 'lastname';
    public const SORT_BY_LAST_NAME_DESC = '-lastname';


    public static array $sortArr = [
        self::SORT_BY_CREATED_AT_ASC,
        self::SORT_BY_CREATED_AT_DESC,
        self::SORT_BY_FIRST_NAME_ASC,
        self::SORT_BY_FIRST_NAME_DESC,
        self::SORT_BY_LAST_NAME_ASC,
        self::SORT_BY_LAST_NAME_DESC
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'perPage' => ['integer', 'max:10000'],
            'page' => ['integer'],
            'sort' => ['string', 'in:' . implode(',', self::$sortArr)],
            'search' => ['string', 'nullable'],
        ];
    }

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
     * @param string|null $value
     * @return string|null
     */
    public function getFieldName(?string $value):? string
    {
        return match ($value) {
            self::SORT_BY_CREATED_AT_ASC, self::SORT_BY_CREATED_AT_DESC => 'directors.created_at',
            self::SORT_BY_FIRST_NAME_ASC, self::SORT_BY_FIRST_NAME_DESC => 'directors.firstname',
            self::SORT_BY_LAST_NAME_ASC, self::SORT_BY_LAST_NAME_DESC => 'directors.lastname',

            default => $value,
        };
    }
}
