<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleImage;
use Illuminate\Support\Carbon;

class GuestArticleController extends Controller
{
    public function index(){
        $articles = Article::with('galleries')->latest()->paginate(6);
    
        return view('articles', [
            "title" => "All Articles",
            "articles" => $articles,
            "articleCount" => Article::count()
        ]);
    }
    public function show(Article $article){
        return view('article', [
            "title" => $article->title,
            "article" => $article,
            "images" => ArticleImage::select('url')->where('article_id', '=', $article->id)->get()
        ]);
    }
}
