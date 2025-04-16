<?php
namespace App\Http\Controllers\Content;

class ArticleController extends BaseContentController
{
    protected string $type = 'articles';
    public function create()
        {
            return view('contents.articles.create', ['type' => 'articles']);
        }
}
