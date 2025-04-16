<?php

namespace App\Http\Controllers\Content;

class AudioController extends BaseContentController
{
    protected string $type = 'audios';
    public function create()
    {
        return view('contents.audios.create', ['type' => 'audios']);
    }

}