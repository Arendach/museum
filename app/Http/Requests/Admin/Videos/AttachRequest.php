<?php

namespace App\Http\Requests\Admin\Videos;

use App\Http\Requests\ApiRequest;
use App\Models\Contracts\HasVideoContract;
use App\Models\Model;
use App\Models\Video;
use Illuminate\Validation\ValidationException;

class AttachRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'video_id' => 'required|exists:videos,id',
            'model'    => 'required|string',
            'id'       => 'required|int',
        ];
    }

    public function getModel(): HasVideoContract
    {
        $model = $this->get('model');
        $id = $this->get('id');

        if (!$model || !$id) {
            throw new ValidationException('Validation failed');
        }

        return resolve("App\\Models\\$model")->findOrFail($id);
    }

    public function getVideo(): Video
    {
        return Video::findOrFail($this->get('video_id'));
    }
}
