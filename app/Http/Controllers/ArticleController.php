<?php

namespace App\Http\Controllers;

use App\Contracts\Article\IArticleRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Article\ArticlePostRequest;
use App\Http\Resources\Article\Article as ArticleResource;
use App\Http\Resources\Article\ArticleCollection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

/**
 * @resource Articles
 *
 * Article routes
 */
class ArticleController extends Controller
{
    protected $article;

    public function __construct(IArticleRepository $article)
    {
        $this->article = $article;
    }

    public function index()
    {
        return new ArticleCollection($this->article->selectAll());
    }

    public function show($id)
    {
        return new ArticleResource($this->article->find($id));
    }

    public function store(ArticlePostRequest $request)
    {
        return new ArticleResource($this->article->store($request)); 
    }

    public function update(Request $request, $id)
    {
        return new ArticleResource($this->article->update($request, $id));
    }
}
