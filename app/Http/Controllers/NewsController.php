<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->paginate(4);

        return view('news', compact('news'));
    }

    public function show($id)
    {
        $new = News::findOrFail($id);
        $latest_5_news = News::latest()->take(5)->get();
        $comments = Comment::where('news_id', '=', $id)->latest()->get();

        return view('news_single', compact('new', 'latest_5_news', 'comments'));
    }
}
