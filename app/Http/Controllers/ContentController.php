<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Menu;
use App\Models\SubMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ContentController extends Controller
{
    public function editorContent(Request $request)
    {
        $menu = Menu::all();
        $subMenu = SubMenu::all();
        return view('content.editor', compact('menu', 'subMenu'));
    }

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
                $action = '<a href="content/'.Crypt::encrypt($content->id).'/edit" class="btn btn-primary btn-sm me-2" title="Edit"> <i class="fas fa-edit"></i> </a>';
                $action .= '<button class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i> </button>';
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'menu_id' => 'required',
            'sub_menu_id' => 'required',
            'title' => 'required',
            'sub_title' => 'required',
        ]);

        
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
    public function edit($id)
    {
        //
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
