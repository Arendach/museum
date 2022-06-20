<?php

namespace App\Actions\Pictures;

use App\Models\Picture;
use Image;

class OptimizeAction
{
    private $picture;

    public function run(Picture $picture): void
    {
        return;
        $this->picture = Image::make(
            public_path($picture->path)
        );

        Image::canvas(960, 400)
            ->fill('#cccccc')
            ->insert($this->picture)
            ->save(public_path('test.jpg'));

        $this->picture->resize(
            960,
            400,
            function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save();

        dd(
            $this->picture->width(),
            $this->picture->height()
        );
    }
}
