<?php

namespace App\Http\Controllers;

use App\Models\CategoryNews;
use App\Models\News;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $categoryNews = CategoryNews::orderBy('id', 'DESC')->get();
            return DataTables::of($categoryNews)
            ->addIndexColumn()
            ->addColumn('action', function($categoryNews) {
                $action = null;
                if ( auth()->user()->userRole->role->permission->categorynews_edit ) {
                    $action = '<div class="btn-group" role="group"> <a href="'.url('admin/category-news/'.$categoryNews['id'].'/edit').'" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </a>';
                }
                if ( auth()->user()->userRole->role->permission->categorynews_delete ) {
                    if ( News::where('category_news_id', $categoryNews->id)->exists() ) {
                        $action .= '<button class="btn btn-danger btn-sm" data-id="'.$categoryNews['id'].'" id="delete" disabled> <i class="fas fa-trash"></i> </button> </div>';
                    } else {
                        $action .= '<button class="btn btn-danger btn-sm" data-id="'.$categoryNews['id'].'" id="delete"> <i class="fas fa-trash"></i> </button> </div>';
                    }
                }
                return $action;
            })
            ->rawColumns(['DT_Row_Index', 'action'])
            ->make(true);
        }

        return view('category-news.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryNews = null;
        return view('category-news.editor', compact('categoryNews'));
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
            'title' => 'required'
        ], [
            'title.required' => 'Thid field is required'
        ]);

        $slugCategoryNews = CategoryNews::generateSlugByTitle($request->title);

        CategoryNews::create([
            'title' => $request->title,
            'slug' => $slugCategoryNews
        ]);

        return redirect('admin/category-news')->with('status', 'Data success created !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryNews $categoryNews)
    {
        return view('category-news.editor', compact('categoryNews'));
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
            'title' => 'required'
        ], [
            'title.required' => 'Thid field is required'
        ]);

        $slugCategoryNews = CategoryNews::generateSlugByTitle($request->title);

        CategoryNews::where('id', $id)->update([
            'title' => $request->title,
            'slug' => $slugCategoryNews
        ]);

        return redirect('admin/category-news')->with('status', 'Data success updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CategoryNews::where('id', $id)->delete();
        return response()->json(['code' => 1, 'msg' => 'Data Has Been Deleted']);
    }

    public function accessUrl(Request $request)
    {
        if ( $request->route()->getName() === 'categorynews.index' ) {
            if (auth()->user()->userRole->role->permission->categorynews_view) {
                return $this->index($request);
            } else {
                return view('permission-access-page');
            }
        } elseif ( $request->route()->getName() === 'categorynews.create' ) {
            if (auth()->user()->userRole->role->permission->categorynews_create) {
                return $this->create();
            } else {
                return view('permission-access-page');
            }
        } elseif ( $request->route()->getName() === 'categorynews.store' ) {
            return $this->store($request);
        } elseif ( $request->route()->getName() === 'categorynews.edit' ) {
            if (auth()->user()->userRole->role->permission->categorynews_edit) {
                $categorynews = new CategoryNews();
                return $this->edit($categorynews);
            } else {
                return view('permission-access-page');
            }
        } elseif ( $request->route()->getName() === 'categorynews.update' ) {
            return $this->update($request, $request->id);
        } elseif ( $request->route()->getName() === 'categorynews.delete' ) {
            if (auth()->user()->userRole->role->permission->categorynews_delete) {
                return $this->destroy($request->id);
            } else {
                return view('permission-access-page');
            }
        }
    }
}
