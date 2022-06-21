<?php

namespace App\Http\Requests\Admin\Pictures;

use App\Http\Requests\ApiRequest;
use App\Models\Model;

class UploadRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'upload' => 'required|image',
            //'model'   => 'required',
           // 'id'      => 'required',
        ];
    }

//    public function getModel(): Model
//    {
//        $model = $this->get('model');
//        $id = $this->get('id');
//
//        /** @var Model $namespace */
//        $namespace = "App\\Models\\$model";
//
//        return $namespace::findOrFail($id);
//    }
}
