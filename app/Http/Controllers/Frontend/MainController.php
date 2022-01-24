<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Content;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.index');
    }

    /**
     * Display the specified resource.
     * @param  int      $id
     * @param  string   $slug
     * @return \Illuminate\Http\Response
     */
    public function service($id, $slug)
    {
        $data = Content::where('menu_id', $id)->where('slug', $slug)->first();
        
        return view('frontend.services.index', compact('data'));
    }

    /**
     * Show List the news.
     *
     * @return \Illuminate\Http\Response
     */
    public function news()
    {
        return view('frontend.news.index');
    }

    /**
     * Show Detail the news.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function newsDetail($slug)
    {
        return view('frontend.news.show');
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
