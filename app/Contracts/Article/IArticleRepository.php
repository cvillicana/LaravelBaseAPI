<?php

namespace App\Contracts\Article;

use Illuminate\Http\Request;

interface IArticleRepository
{
	public function selectAll();

    public function find($id);

    public function store(Request $request);
}

