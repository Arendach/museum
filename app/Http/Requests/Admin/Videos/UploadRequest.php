<?php

namespace App\Http\Requests\Admin\Videos;

use App\Http\Requests\ApiRequest;
use App\Models\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;

class UploadRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'title'           => 'required|max:255',
            'title_ru'        => 'nullable|max:255',
            'title_en'        => 'nullable|max:255',
            'description'     => 'nullable',
            'description_ru'  => 'nullable',
            'description_en'  => 'nullable',
            'source'          => 'nullable|max:255',
            'source_title'    => 'nullable|max:255',
            'source_title_ru' => 'nullable|max:255',
            'source_title_en' => 'nullable|max:255',
            'video'           => 'required|file',
            'model'           => 'nullable',
            'id'              => [Rule::requiredIf(fn() => !!$this->get('model'))],
        ];
    }

    public function getModel(): ?Model
    {
        $model = $this->get('model');
        $id = $this->get('id');

        if (!$model || !$id) {
            return null;
        }

        /** @var Model $namespace */
        $namespace = "App\\Models\\$model";

        return $namespace::findOrFail($id);
    }

    public function getVideo(): UploadedFile
    {
        return $this->video;
    }

    public function getData(): array
    {
        return array_merge([
            'type' => 'default',
        ], $this->only([
            'title', 'title_ru', 'title_en',
            'description', 'description_ru', 'description_en',
            'source_title', 'source_title_ru', 'source_title_en',
            'source',
        ]));
    }
}
