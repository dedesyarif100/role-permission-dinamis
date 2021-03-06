<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Menu;
use App\Models\SubMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $content = Content::orderBy('id', 'DESC')->get();
            return DataTables::of($content)
            ->addIndexColumn()
            ->editColumn('menu', function($content) {
                return $content->menu->name;
            })
            ->editColumn('sub_menu', function($content) {
                return $content->subMenu->name;
            })
            ->addColumn('action', function($content) {
                $action = '<div class="btn-group" role="group"> <a href="'.url('admin/content/'.$content['id']).'" class="btn btn-success btn-sm"> <i class="fa fa-eye"></i> </a>';
                if ( auth()->user()->userRole->role->permission->content_edit ) {
                    $action .= '<a href="'.url('admin/content/'.$content['id'].'/edit').'" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </a>';
                }
                if ( auth()->user()->userRole->role->permission->content_delete ) {
                    $action .= '<button class="btn btn-danger btn-sm" data-id="'.$content['id'].'" id="delete"> <i class="fas fa-trash"></i> </button> </div>';
                }
                return $action;
            })
            ->rawColumns(['DT_Row_Index', 'menu', 'sub_menu', 'action'])
            ->make(true);
        }

        return view('content.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allMenu = Menu::all();
        $allSubMenu = SubMenu::all();
        $content = null;
        return view('content.editor', compact('allMenu', 'allSubMenu', 'content'));
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
            'menu_id' => 'required',
            'sub_menu_id' => 'required',
            'title' => 'required',
        ], [
            'menu_id.required' => 'This field is required',
            'sub_menu_id.required' => 'This field is required',
            'title.required' => 'This field is required',
        ]);

        $slugContent = Content::generateSlugByTitle($request->title);

        $outputFile = 'content';
        $path = Storage::disk('public')->put($outputFile, $request->image);

        Content::create([
            'menu_id' => $request->menu_id,
            'sub_menu_id' => $request->sub_menu_id,
            'title' => $request->title,
            'slug' => $slugContent,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
            'image' => $path
        ]);

        return redirect('admin/content')->with('status', 'Data success created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        return view('content.detail', compact('content'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content)
    {
        $allMenu = Menu::all();
        $allSubMenu = SubMenu::all();
        return view('content.editor', compact('content', 'allMenu', 'allSubMenu'));
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
            'menu_id' => 'required',
            'sub_menu_id' => 'required',
            'title' => 'required',
        ], [
            'menu_id.required' => 'This field is required',
            'sub_menu_id.required' => 'This field is required',
            'title.required' => 'This field is required',
        ]);

        $slugContent = Content::generateSlugByTitle($request->title);

        $content = Content::find($id);

        $outputFile = 'content';
        Storage::disk('public')->delete($outputFile, $content->image);

        $outputFile = 'content';
        $path = Storage::disk('public')->put($outputFile, $request->image);

        Content::where('id', $id)->update([
            'menu_id' => $request->menu_id,
            'sub_menu_id' => $request->sub_menu_id,
            'title' => $request->title,
            'slug' => $slugContent,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
            'image' => $path
        ]);

        return redirect('admin/content')->with('status', 'Data success updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
        $outputFile = 'content';
        Storage::disk('public')->delete($outputFile, $content->image);
        Content::where('id', $content->id)->delete();
        return response()->json(['code' => 1, 'msg' => 'Content Has Been Deleted']);
    }

    public function accessUrl(Request $request)
    {
        if ( $request->route()->getName() === 'content.index' ) {
            if (auth()->user()->userRole->role->permission->content_view) {
                return $this->index($request);
            } else {
                return view('permission-access-page');
            }
        } elseif ( $request->route()->getName() === 'content.create' ) {
            if (auth()->user()->userRole->role->permission->content_create) {
                return $this->create();
            } else {
                return view('permission-access-page');
            }
        } elseif ( $request->route()->getName() === 'content.store' ) {
            return $this->store($request);
        } elseif ( $request->route()->getName() === 'content.edit' ) {
            if (auth()->user()->userRole->role->permission->content_edit) {
                $content = new Content;
                return $this->edit($content);
            } else {
                return view('permission-access-page');
            }
        } elseif ( $request->route()->getName() === 'content.update' ) {
            return $this->update($request, $request->id);
        } elseif ( $request->route()->getName() === 'content.delete' ) {
            if (auth()->user()->userRole->role->permission->content_delete) {
                return $this->destroy($request->id);
            } else {
                return view('permission-access-page');
            }
        }
    }
}
