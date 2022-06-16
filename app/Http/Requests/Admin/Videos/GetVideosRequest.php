<?php

namespace App\Http\Requests\Admin\Videos;

use App\Http\Requests\ApiRequest;
use Illuminate\Validation\Rule;

class GetVideosRequest extends ApiRequest
{
    private array $allowedModels = [
        'Article',
        'Weapon',
    ];

    public function rules(): array
    {
        return [
            'id'    => 'required|int',
            'model' => ['required', Rule::in($this->allowedModels)]
        ];
    }

    public function getId(): int
    {
        return $this->get('id');
    }

    public function getModel(): string
    {
        $model = $this->get('model');

        return "App\\Models\\$model";
    }
}
