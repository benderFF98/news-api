<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    /**
     * Articles Index.
     *
     * This route brings all articles in the database.
     */
    public function index()
    {
        $articles = Article::search(\request('search'))->paginate(\request('perPage'));

        return response()->json(['data' => $articles]);
    }

    public function show(Article $article)
    {
        return $article;
    }
}
