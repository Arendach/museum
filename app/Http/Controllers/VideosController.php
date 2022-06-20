<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\View\View;

class VideosController extends Controller
{
    public function index(string $name, int $id): View
    {
        $video = Video::findOrFail($id);

        abort_if($name !== \Str::slug($video->title), 404);

        $title = $video->t('title');
        $breadcrumbs = [[$title]];

        return view('pages.video', compact('video', 'title', 'breadcrumbs'));
    }
}
