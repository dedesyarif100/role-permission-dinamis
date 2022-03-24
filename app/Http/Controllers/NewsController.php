<?php

namespace App\Http\Controllers;

use App\Models\CategoryNews;
use App\Models\Faq;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $news = News::orderBy('id', 'DESC')->get();
            return DataTables::of($news)
            ->addIndexColumn()
            ->editColumn('categoryNews', function($news) {
                return $news->categoryNews->title;
            })
            // ->editColumn('user', function($news) {
            //     return $news->user->name;
            // })
            ->addColumn('action', function($news) {
                $action = '<div class="btn-group" role="group"> <a href="'.url('admin/newsdata/'.$news['id']).'" class="btn btn-success btn-sm"> <i class="fa fa-eye"></i> </a>';
                $action .= '<a href="'.url('admin/newsdata/'.$news['id'].'/edit').'" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </a>';
                $action .= '<button class="btn btn-danger btn-sm" data-id="'.$news['id'].'" id="delete"> <i class="fas fa-trash"></i> </button> </div>';
                return $action;
            })
            ->rawColumns(['DT_Row_Index', 'categoryNews', 'action'])
            ->make(true);
        }

        return view('newsdata.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $news = null;
        $categoryNews = CategoryNews::all();
        return view('newsdata.editor', compact('news', 'categoryNews'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_news_id' => 'required',
            'title' => 'required',
            'image' => 'required',
            'description' => 'required'
        ], [
            'category_news_id.required' => 'This field is required',
            'title.required' => 'This field is required',
            'image.required' => 'This field is required',
            'description.required' => 'This field is required'
        ]);

        $slugNews = News::generateSlugByTitle($request->title);

        $outputFile = 'news-list';
        $path = Storage::disk('public')->put($outputFile, $request->image);

        News::create([
            'category_news_id' => $request->category_news_id,
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'slug' => $slugNews,
            'image' => $path,
            'description' => $request->description
        ]);

        return redirect('admin/newsdata')->with('status', 'Data success created !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::find($id)->newsMorphToMany;
        dd($news, (new Faq)->getMorphClass());
        return view('newsdata.detail', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoryNews = CategoryNews::all();
        $news = News::find($id);
        return view('newsdata.editor', compact('news', 'categoryNews'));
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
        $request->validate([
            'category_news_id' => 'required',
            'title' => 'required',
            'image' => 'required',
            'description' => 'required'
        ], [
            'category_news_id.required' => 'This field is required',
            'title.required' => 'This field is required',
            'image.required' => 'This field is required',
            'description.required' => 'This field is required'
        ]);

        $slugNews = News::generateSlugByTitle($request->title);

        $news = News::find($id);

        $outputFile = 'news-list';
        Storage::disk('public')->delete($outputFile, $news->image);

        $outputFile = 'news-list';
        $path = Storage::disk('public')->put($outputFile, $request->image);

        News::where('id', $id)->update([
            'category_news_id' => $request->category_news_id,
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'slug' => $slugNews,
            'image' => $path,
            'description' => $request->description
        ]);

        return redirect('admin/newsdata')->with('status', 'Data success updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $outputFile = 'news-list';
        Storage::disk('public')->delete($outputFile, $news->image);
        News::where('id', $news->id)->delete();
        return response()->json(['code' => 1, 'msg' => 'Data Has Been Deleted']);
    }

    public function accessUrl(Request $request)
    {
        if ( $request->route()->getName() === 'newsdata.index' ) {
            if (auth()->user()->userRole->role->permission->newsdata_view) {
                return $this->index($request);
            } else {
                return view('permission-access-page');
            }
        } elseif ( $request->route()->getName() === 'newsdata.create' ) {
            if (auth()->user()->userRole->role->permission->newsdata_create) {
                return $this->create();
            } else {
                return view('permission-access-page');
            }
        } elseif ( $request->route()->getName() === 'newsdata.store' ) {
            return $this->store($request);
        } elseif ( $request->route()->getName() === 'newsdata.edit' ) {
            if (auth()->user()->userRole->role->permission->newsdata_edit) {
                $newsdata = new News();
                return $this->edit($newsdata);
            } else {
                return view('permission-access-page');
            }
        } elseif ( $request->route()->getName() === 'newsdata.update' ) {
            return $this->update($request, $request->id);
        } elseif ( $request->route()->getName() === 'newsdata.delete' ) {
            if (auth()->user()->userRole->role->permission->newsdata_delete) {
                return $this->destroy($request->id);
            } else {
                return view('permission-access-page');
            }
        }
    }
}
