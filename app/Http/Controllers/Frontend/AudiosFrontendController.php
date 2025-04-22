<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Content;

class AudiosFrontendController extends Controller
{
    public function index()
    {
        $contents = Content::where('type', 'audios')->latest()->get();
        return view('frontend.audios', compact('contents'));
    }
}

