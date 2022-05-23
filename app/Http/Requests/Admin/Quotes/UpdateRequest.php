<?php

namespace App\Http\Requests\Admin\Quotes;

use App\Http\Requests\ApiRequest;

class UpdateRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'title'      => 'required',
            'title_ru'   => 'nullable',
            'title_en'   => 'nullable',
            'created_at' => 'nullable|date',
            'people_id'  => 'required|exists:peoples,id'
        ];
    }
}
