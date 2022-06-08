<?php

namespace App\Http\Requests\Admin\Articles;

use App\Http\Requests\ApiRequest;

class ChangePictureRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'picture' => 'required|image'
        ];
    }
}
