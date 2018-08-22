<?php

namespace App\Contracts\Article;

use App\Http\Requests\Article\ArticlePostRequest;
use Illuminate\Http\Request;

interface IArticleRepository
{
	public function selectAll();

    public function find($id);

    public function store(ArticlePostRequest $request);

    public function update(Request $request, $id);
}

