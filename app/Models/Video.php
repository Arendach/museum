<?php

namespace App\Models;

class Video extends Model
{
    public $timestamps = true;

    public function getUrl(): string
    {
        return '';
    }
}
