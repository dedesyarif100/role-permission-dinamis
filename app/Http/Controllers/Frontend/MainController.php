<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Faq;
use App\Models\News;
use App\Models\Trusted;
use App\Models\Service;
use App\Models\Content;
use App\Models\AboutUs;
use App\Models\ContactUs;
use App\Models\SlideShow;
use App\Models\CommentClient;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOTools;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        SEOTools::setTitle('Ananta Mitra Karya');
        SEOTools::setDescription('Ananta, Mitra, Karya, Ananta Mitra, Ananta Mitra Karya, VISA, Visa - Company Establishment - Tax & Accounting - Real Estate');

        $data['service'] = Service::all();
        $data['about'] = AboutUs::first();
        $data['trusted'] = Trusted::all();
        $data['slideshow'] = SlideShow::all();
        $data['comment_client'] = CommentClient::all();
        $data['news'] = News::orderBy('created_at', 'asc')->limit(3)->get();
        $data['contact'] = ContactUs::orderBy('created_at', 'asc')->limit(3)->get();

        return view('frontend.index', $data);
    }

    /**
     * Display the specified resource.
     * @param  string   $slug
     * @return \Illuminate\Http\Response
     */
    public function services($slug)
    {
        $data = Content::where('slug', $slug)->first();
        $popular = Content::orderBy('created_at', 'desc')->limit(5)->get();
        
        SEOTools::setTitle('Ananta Mitra Karya');
        SEOTools::setDescription($data->title);
        
        return view('frontend.services.index', compact('data', 'popular'));
    }

    /**
     * Display the specified resource.
     * @param  string   $slug
     * @return \Illuminate\Http\Response
     */
    public function serviceSingle($slug)
    {
        $data = Service::where('slug', $slug)->first();

        SEOTools::setTitle('Ananta Mitra Karya');
        SEOTools::setDescription($data->title);
        
        return view('frontend.service.index', compact('data'));
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
     * Show About More.
     */
    public function about()
    {
        $data = AboutUs::first();

        SEOTools::setTitle('Ananta Mitra Karya');
        SEOTools::setDescription('About us Ananta Mitra Karya');

        return view('frontend.about.index', compact('data'));
    }

    /**
     * Show FAQ More.
     */
    public function faq()
    {
        $data = Faq::orderBy('created_at', 'asc')->get();

        SEOTools::setTitle('Ananta Mitra Karya');
        SEOTools::setDescription('FAQ Ananta Mitra Karya');

        return view('frontend.faq.index', compact('data'));
    }
}
