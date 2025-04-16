<?php

namespace App\Http\Controllers\Content;

class PdfController extends BaseContentController
{
    protected string $type = 'pdf';
    public function create()
    {
        return view('contents.pdf.create', ['type' => 'pdf']);
    }

}