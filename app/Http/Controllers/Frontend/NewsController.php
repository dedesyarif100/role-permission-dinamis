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

        $data = News::where('category_news_id', $newsId->id)->get();

        return view('frontend.news.index', compact('data'));
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

        return view('frontend.news.show', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
