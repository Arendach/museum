<?php

namespace App\Http\Requests\Admin\Articles;

use App\Http\Requests\ApiRequest;
use Auth;
use Str;

class StoreRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'title'                => 'required|max:255',
            'title_ru'             => 'nullable|max:255',
            'title_en'             => 'nullable|max:255',
            'short_description'    => 'nullable',
            'short_description_ru' => 'nullable',
            'short_description_en' => 'nullable',
            'description'          => 'nullable',
            'description_ru'       => 'nullable',
            'description_en'       => 'nullable',
            'tags'                 => ['nullable', 'array'],
            'is_active'            => 'bool',
            'is_popular'           => 'bool',
        ];
    }

    public function getTags(): array
    {
        return $this->get('tags') ?: [];
    }

    public function getData(): array
    {
        $slug = $this->get('slug', Str::slug($this->get('title')));
        $user_id = Auth::user()->id ?? 1;
        $is_active = $this->boolean('is_active', false);
        $is_popular = $this->boolean('is_popular', false);

        return array_merge(compact('slug', 'user_id', 'is_active', 'is_popular'), $this->only([
            'title', 'title_ru', 'title_en',
            'short_description', 'short_description_ru', 'short_description_en',
            'description', 'description_ru', 'description_en',
            'is_active'
        ]));
    }
}
