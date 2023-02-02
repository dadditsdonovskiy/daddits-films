<?php

namespace App\Http\Requests\Api;

use Illuminate\Support\Facades\Config;

/**
 * Class FormRequest
 */
class FormRequest extends \Illuminate\Foundation\Http\FormRequest
{
    /**
     * @return int
     */
    public function getPerPage(): int
    {
        return (int)$this->get('perPage', Config::get('app.defaultPerPage'));
    }

    /**
     * @return string
     */
    public function getSortField(): string
    {
        return (string)$this->getFieldName($this->get('sort'));
    }

    /**
     * @return string
     */
    public function getSortOrder(): string
    {
        $value = $this->get('sort');
        return $value && $value[0] === '-' ? 'DESC' : 'ASC';
    }
}
