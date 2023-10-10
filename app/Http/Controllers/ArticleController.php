<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();

        return ArticleResource::collection($articles);
    }


    public function show(Article $article)
    {
        return new ArticleResource($article);
    }

    public function store(ArticleRequest $request)
    {
        $article = Article::create($request->validated());

        return response()->json(['data' => $article], 201);
    }

    public function update(Article $article, ArticleRequest $request)
    {
        $article->update($request->validated());

        return response()->json(['data' => $article], 200);
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return response()->noContent();
    }
}
