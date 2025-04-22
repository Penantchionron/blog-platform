<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Content;

class VideosFrontendController extends Controller
{
    public function index()
    {   
        $contents = Content::where('type', 'videos')->latest()->get();
        return view('frontend.videos', compact('contents'));
    }
}
