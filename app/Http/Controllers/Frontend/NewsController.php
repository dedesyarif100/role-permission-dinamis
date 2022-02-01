<?php

namespace App\Http\Controllers\Frontend;

use App\Models\News;
use App\Models\CategoryNews;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $newsId = CategoryNews::where('slug', $slug)->first();

        if ($slug == 'all') {
            $data = News::orderBy('created_at', 'desc')->get();
        } else {
            $data = News::where('category_news_id', $newsId->id)->orderBy('created_at', 'desc')->get();
        }
        
        $popular = News::orderBy('created_at', 'asc')->limit(5)->get();

        return view('frontend.news.index', compact('data', 'popular'));
    }

    /**
     * Show the form for detail the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $data = News::where('slug', $slug)->first();

        $popular = News::orderBy('created_at', 'asc')->limit(5)->get();

        return view('frontend.news.show', compact('data', 'popular'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
