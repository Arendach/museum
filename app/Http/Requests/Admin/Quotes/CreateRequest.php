<?php

namespace App\Http\Requests\Admin\Quotes;

use App\Http\Requests\ApiRequest;

class CreateRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'title'     => 'required',
            'title_ru'  => 'nullable',
            'title_en'  => 'nullable',
            'people_id' => 'required|exists:peoples,id'
        ];
    }
}
