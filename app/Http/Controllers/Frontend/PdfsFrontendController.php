<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Content;

class PdfsFrontendController extends Controller
{
    public function index()
    {
        $contents = Content::where('type', 'pdf')->latest()->get();
        return view('frontend.pdf', compact('contents'));
    }
}

