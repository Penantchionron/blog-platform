<?php

namespace App\Http\Controllers\Content;

class VideoController extends BaseContentController
{
    protected string $type = 'videos';
    public function create()
    {
        return view('contents.videos.create', ['type' => 'videos']);
    }


}