<?php

namespace App\Http\Requests\Admin\Tags;

use App\Http\Requests\ApiRequest;
use Str;

class CreateRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'title'    => 'required',
            'title_ru' => 'nullable',
            'title_en' => 'nullable',
            'slug'     => 'nullable',
        ];
    }

    public function getData(): array
    {
        $slug = $this->get('slug', Str::slug($this->get('title')));

        return array_merge(compact('slug'), $this->only('title', 'title_ru', 'title_en'));
    }
}
