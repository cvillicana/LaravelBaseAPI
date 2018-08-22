<?php

namespace App\Repositories\Article;

use App\Contracts\Article\IArticleRepository;
use App\Http\Requests\Article\ArticlePostRequest;
use App\Models\Article;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ArticleRepository implements IArticleRepository
{
    public function selectAll()
    {
        return Article::all();
    }

    public function find($id)
    {
        $article = Article::findOrFail($id);
        return $article;
    }

    public function store(ArticlePostRequest $request)
    {
    	return Article::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->update($request->all());

        return $article;
    }
}