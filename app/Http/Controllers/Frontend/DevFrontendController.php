<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
class DevFrontendController extends Controller
{
    //
    public function index()
    {
        $contents = Content::where('type', 'articles')->latest()->get();
        return view('frontend.dev', compact('contents'));
    }
}
