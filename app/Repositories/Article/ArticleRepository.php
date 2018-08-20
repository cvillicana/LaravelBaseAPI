<?php

namespace App\Repositories\Article;

use App\Contracts\Article\IArticleRepository;
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

    public function store(Request $request)
    {
    	$validatedData = $request->validate([
        	'title' => 'required|max:255',
        	'body' => 'required',
    	]);

    	return Article::create($request->all());
    }
}