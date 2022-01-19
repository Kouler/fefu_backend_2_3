<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function getList() {
        $news = News::query()
            ->where('published_at','<=', now())
            ->where('is_published', true)
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->paginate(5);

        return view('newsList', ['news' => $news]);
    }

    public function getDetails(string $slug) {
        $news = News::query()
            ->where('published_at','<=', now())
            ->where('is_published', true)
            ->where('slug', $slug)
            ->first();

        if ($news === null) {
            return abort(404);
        }
        return view('newsDetails', ['news' => $news]);
    }
}
