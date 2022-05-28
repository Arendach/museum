<?php

namespace App\Http\Requests\Admin\Peoples;

use App\Http\Requests\ApiRequest;

class UpdateRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'name'       => 'required',
            'name_ru'    => 'nullable',
            'name_en'    => 'nullable',
            'country_id' => 'nullable|exists:countries,id',
        ];
    }
}
