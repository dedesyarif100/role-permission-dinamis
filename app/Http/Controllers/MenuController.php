<?php

namespace App\Http\Controllers;

use App\Models\ActivityFeed;
use App\Models\Book;
use App\Models\Content;
use App\Models\Faq;
use App\Models\Menu;
use App\Models\MenuNews;
use App\Models\News;
use App\Models\Photo;
use App\Models\Post;
use App\Models\SubMenu;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route as FacadesRoute;
use Yajra\DataTables\Facades\DataTables;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $menu = Menu::orderBy('id', 'DESC')->get();
            return DataTables::of($menu)
            ->addIndexColumn()
            ->addColumn('action', function($menu) {
                $action = '<div class="btn-group" role="group"> <a href="'.url('admin/menu/'.$menu['id'].'/edit').'" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </a>';
                if ( SubMenu::where('menu_id', $menu->id)->exists() || Content::where('menu_id', $menu->id)->exists() ) {
                    $action .= '<button class="btn btn-danger btn-sm" disabled> <i class="fa fa-trash"></i> </button>';
                } else {
                    $action .= '<button class="btn btn-danger btn-sm" data-id="'.$menu['id'].'" id="delete" title="Delete"> <i class="fa fa-trash"></i> </button>';
                }
                return $action;
            })
            ->rawColumns(['DT_Row_Index', 'action'])
            ->make(true);
        }

        return view('menu.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = null;
        return view('menu.editor', compact('menu'));
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
            'name' => 'required'
        ], [
            'name.required' => 'This field is required'
        ]);

        Menu::create([
            'name' => $request->name
        ]);

        return redirect('admin/menu')->with('status', 'Data success created!');
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
    public function edit(Menu $menu)
    {
        // Chaining orWhere Clauses After Relationships
        DB::enableQueryLog();
        // $value = $menu->subMenu()->where('created_at', NULL)->orWhere('updated_at', NULL)->get()->toArray();
        // Ambil SubMenu berdasarkan menu_id yang dimana created_at & updated_at = NULL
        // dd($value);

        // $value = $menu->subMenu()->where(function(Builder $query) {
        //     return $query->where('created_at', NULL)->orWhere('updated_at', NULL);
        // })->get()->toArray();
        // Ambil SubMenu berdasarkan menu_id yang dimana created_at & updated_at = NULL
        // dd($value);

        // Querying Relationship Existence
        // dd(
        //     Menu::has('subMenu')->get(),
        //     // Ambil menu yang setidaknya memiliki satu subMenu
        //     Menu::has('subMenu', '>=', 3)->get(),
        //     // Ambil menu yang setidaknya memiliki tiga subMenu
        //     Menu::has('subMenu.content')->get()
        //     // Ambil menu yang setidaknya subMenu memiliki satu content
        // );
        // $menu = Menu::whereHas('subMenu', function(Builder $query) {
        //     $query->where('name', 'like', '%open%');
        // })->get();
        // Ambil data menu berdasarkan subMenu, menu_id, dimana value name memiliki kalimat open

        // $menu = Menu::whereHas('subMenu', function(Builder $query) {
        //     $query->where('name', 'like', '%asa%');
        // }, '>=', 3)->get();
        // Ambil data menu berdasarkan subMenu, menu_id, dimana value name dari subMenu memiliki kalimat asa lebih dari atau samadengan 3
        // dd($menu);

        // Inline Relationship Existence Queries
        // $value = Menu::whereRelation('subMenu', 'created_at', NULL)->get();
        // Ambil data menu berdasarkan SubMenu, menu_id dimana SubMenu kolom created_at = NULL

        // $value = Menu::whereRelation('subMenu', 'created_at', '!=', NULL)->get();
        // Ambil data menu berdasarkan SubMenu, menu_id dimana SubMenu kolom created_at != NULL

        // Querying Relationship Absence
        // $value = Menu::doesntHave('subMenu')->get();
        // Ambil data menu yang tidak memiliki SubMenu berdasarkan menu_id

        // $value = Menu::whereDoesntHave('subMenu', function(Builder $query) {
        //     $query->where('name', 'like', '%asa%');
        // })->get();
        // Ambil data menu berdasarkan SubMenu kolom name yang tidak memiliki kalimat dengan value asa

        // $value = Menu::whereDoesntHave('subMenu.content', function(Builder $query) {
        //     $query->where('description', 'like', '%Software%');
        // })->get()->toArray();
        // Ambil data menu berdasarkan SubMenu setidaknya memiliki content kolom description yang memiliki kalimat Software

        // Querying Morph To Relationships
        // $value = MenuNews::whereHasMorph(
        //     'menuNews',
        //     [Menu::class, News::class, Faq::class],
        //     function (Builder $query) {
        //         $query->where('menu_news.title', 'like', '%html%');
        //     }
        // )->get();

        // $value = MenuNews::whereDoesntHaveMorph(
        //     'menuNews',
        //     [Menu::class, News::class, Faq::class],
        //     function (Builder $query) {
        //         $query->where('menu_news.title', 'like', '%html%');
        //     }
        // )->get();

        // $value = MenuNews::whereHasMorph(
        //     'menuNews',
        //     [Menu::class, News::class],
        //     function (Builder $query, $type) {
        //         $column = $type === News::class ? 'content' : 'title';
        //         $query->where($column, 'like', '%html%');
        //     }
        // )->get();

        // Querying All Related Models
        // $value = MenuNews::whereHasMorph('menuNews', '*', function(Builder $query) {
        //     $query->where('menu_news.title', 'like', '%html%');
        // })->get()->toArray();

        // $value = MenuNews::whereDoesntHaveMorph('menuNews', '*', function(Builder $query) {
        //     $query->where('menu_news.title', 'like', '%html%');
        // })->get()->toArray();

        // Counting Related Models
        // $value = Menu::withCount('content')->get();
        // dd($value->toArray(), $value[0]->content_count, $value[1]->content_count);

        // $value = Menu::withCount(['subMenu', 'content' => function (Builder $query) {
        //     $query->where('description', 'like', '%amazing%');
        // }])->get();
        // dd($value->toArray());

        // $value = Menu::withCount(['subMenu' => function (Builder $query) {
        //     $query->where('name', 'like', '%asa%');
        // }, 'content' => function (Builder $query) {
        //     $query->where('description', 'like', '%amazing%');
        // }])->get();

        // $value = Menu::withCount(['content', 'subMenu as createdat_submenu_null' => function (Builder $query) {
        //     $query->where('created_at', NULL);
        // }])->get();
        // dd($value->toArray());

        // Deferred Count Loading
        // $value = Menu::find(3);
        // dd($value->loadCount('subMenu'));

        // $value = Menu::find(1);
        // $value = $value->loadCount(['subMenu' => function ($query) {
        //     $query->where('created_at', NULL);
        // }]);
        // dd($value);

        // Relationship Counting & Custom Select Statements
        // $value = Menu::select('id', 'name')->withCount('subMenu')->get();
        // dd($value);

        // Other Aggregate Functions
        // $menu = Menu::withSum('subMenu', 'quantity')->get()->toArray();
        // $menu = Menu::withMin('subMenu', 'quantity')->get()->toArray();
        // $menu = Menu::withMax('subMenu', 'quantity')->get()->toArray();
        // $menu = Menu::withAvg('subMenu', 'quantity')->get()->toArray();
        // $menu = Menu::withExists('subMenu', 'quantity')->get()->toArray();
        // $menu = Menu::withSum('subMenu as total_quantity', 'quantity')->get()->toArray();

        // $menu = Menu::find(2);
        // dd($menu->loadSum('subMenu', 'quantity'));

        // $menu = Menu::select(['id', 'name'])->withExists('subMenu')->get();
        // dd($menu);

        // Counting Related Models On Morph To Relationships
        // $activities = ActivityFeed::with([
        //     'parentable' => function (MorphTo $morphTo) {
        //         $cek = $morphTo->morphWithCount([
        //             Photo::class => ['tags'],
        //             Post::class => ['comments']
        //         ]);
        //     }
        // ])->get();

        // Deferred Count Loading
        // $activities = ActivityFeed::with('parentable')->get();
        // $activities->loadMorphCount('parentable', [
        //     Photo::class => ['tags'],
        //     Post::class => ['comments'],
        // ]);
        // dd($activities);

        // Eager Loading
        // $books = Book::all();
        // foreach ($books as $key => $book) {
        //     // dd($book->author->name);
        // }

        // $books = Book::with('author')->get();
        // foreach ($books as $key => $book) {
        //     dd($book->author->name);
        // }

        // Eager Loading Multiple Relationships
        // $books = Book::with(['author', 'publisher'])->get();
        // dd($books);

        // Nested Eager Loading
        // $books = Book::with('author.photo.post.comments')->get();
        // foreach ($books as $key => $book) {
        //     foreach ($book->author->photo->post->comments as $key => $comment) {
        //         dd($comment->name);
        //     }
        // }
        // dd($books);

        // Nested Eager Loading morphTo Relationships
        // $activities = ActivityFeed::query()
        //                 ->with(['parentable' => function (MorphTo $morphTo) {
        //                     $cek = $morphTo->morphWith([
        //                         Photo::class,
        //                         Post::class,
        //                     ]);
        //                     // dd($cek);
        //                 }])->get();
        // dd($activities);

        // Eager Loading Specific Columns
        // $books = Book::with('author:id,name,book_id,photo_id,post_id')->get();
        // dd($books);

        // Eager Loading By Default
        $books = Book::without('author')->get();
        dd($books);






        // $value = Menu::get()->map(function($item, $key) {
        //     return $item->name;
        // });
        // dd($value);

        // SubMenu::with('menu')->get();
        dd(DB::getQueryLog());
        return view('menu.editor', compact('menu'));
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
        // Gate::allows('menu.update', $)
        $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'This field is required'
        ]);

        Menu::where('id', $id)->update([
            'name' => $request->name,
        ]);

        return redirect('admin/menu')->with('status', 'Data success updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Menu::where('id', $id)->delete();
        return response()->json(['code' => 1, 'msg' => 'Menu Has Been Deleted']);
    }

    public function accessUrl(Request $request)
    {
        if ( $request->route()->getName() === 'menu.index' ) {
            if (auth()->user()->userRole->role->permission->menu_view) {
                return $this->index($request);
            } else {
                return view('permission-access-page');
            }
        } elseif ( $request->route()->getName() === 'menu.create' ) {
            if (auth()->user()->userRole->role->permission->menu_create) {
                return $this->create();
            } else {
                return view('permission-access-page');
            }
        } elseif ( $request->route()->getName() === 'menu.store' ) {
            return $this->store($request);
        } elseif ( $request->route()->getName() === 'menu.edit' ) {
            if (auth()->user()->userRole->role->permission->menu_edit) {
                $menu = new Menu;
                return $this->edit($menu);
            } else {
                return view('permission-access-page');
            }
        } elseif ( $request->route()->getName() === 'menu.update' ) {
            return $this->update($request, $request->id);
        } elseif ( $request->route()->getName() === 'menu.delete' ) {
            if (auth()->user()->userRole->role->permission->menu_delete) {
                return $this->destroy($request->id);
            } else {
                return view('permission-access-page');
            }
        }
    }
}
