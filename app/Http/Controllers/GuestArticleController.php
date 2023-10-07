<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleImage;

class GuestArticleController extends Controller
{
    public function index(){
        // $images = ArticleImage::select('url')->where('article_id', '=', $article->id)->get();
        // dd($images);
        return view('articles', [
            "title" => "All Articles",
            "articles" => Article::latest()->paginate(7)
        ]);
    }
    public function show(Article $article){
        // $images = ArticleImage::select('url')->where('article_id', '=', $article->id)->get();
        // dd($images);
        return view('article', [
            "title" => $article->title,
            "article" => $article,
            "images" => ArticleImage::select('url')->where('article_id', '=', $article->id)->get(),
        ]);
    }
}
