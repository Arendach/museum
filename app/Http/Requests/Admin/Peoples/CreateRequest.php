<?php

namespace App\Http\Requests\Admin\Peoples;

use App\Http\Requests\ApiRequest;

class CreateRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'name'    => 'required',
            'name_ru' => 'nullable',
            'name_en' => 'nullable',
        ];
    }
}
