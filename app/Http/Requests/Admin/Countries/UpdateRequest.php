<?php

namespace App\Http\Requests\Admin\Countries;

use App\Http\Requests\ApiRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'title'          => 'required',
            'title_ru'       => 'nullable',
            'title_en'       => 'nullable',
            'description'    => 'nullable',
            'description_ru' => 'nullable',
            'description_en' => 'nullable',
            'code'           => [
                'required',
                'string',
                Rule::unique('countries', 'code')->ignore($this->route('id'))
            ],
            'status'         => 'required',
            'is_top'         => 'boolean',
            'is_active'      => 'boolean',
            'slug'           => [
                'required',
                Rule::unique('countries', 'slug')->ignore($this->route('id'))
            ],
        ];
    }
}
