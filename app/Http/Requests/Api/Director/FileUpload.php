<?php

namespace App\Http\Requests\Api\Director;

use App\Http\Requests\Api\FormRequest;
use App\Helpers\ConstantHelper;
use App\Models\DirectorImage;

/**
 * Class FileUpload
 */
class FileUpload extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'file' => ['required', ConstantHelper::MAX_FILE_SIZE, ConstantHelper::IMAGE_FILES_MIMES],
            'type' => ['integer', 'required', 'in:' . implode(',', DirectorImage::$types)],
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'file.mimes' => $this->file('file')
                ? '* ' . $this->file('file')->getClientOriginalName() . ' * ' . __('validation.mimes')
                :  __('validation.mimes'),
            'file.max' => $this->file('file')
                ? '* ' . $this->file('file')->getClientOriginalName() . ' * ' . __('validation.max.file')
                :  __('validation.max.file')
        ];
    }
}
