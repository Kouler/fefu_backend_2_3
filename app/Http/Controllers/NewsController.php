<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function getList() {
        $news = News::where('published_at','<=', now())
            ->where('is_published', true)
            ->orderBy('published_at')
            ->orderBy('id', 'desc')
            ->paginate(5);

        return view('newsList', ['news' => $news]);
        //dd($news);
    }

    public function getDetails(string $slug) {
        $news = News::where('published_at','<=', now())
            ->where('is_published', true)
            ->where('slug', $slug)
            ->first();

        if (!$news) {
            return abort(404);
        }
        return view('newsDetails', ['news' => $news]);
    }
}
