<?php

namespace App\Tasks\Pictures;

use Illuminate\Http\UploadedFile;

/**
 * TODO: план на майбутнє. розписати по хорошому загрузку файлів, розділивши файли по папках
 */
class UploadPictureTask
{
    public function run(UploadedFile $picture): string
    {
        return 'storage/' . $picture->store('images');
    }
}
