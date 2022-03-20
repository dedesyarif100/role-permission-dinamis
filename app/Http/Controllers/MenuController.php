<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Menu;
use App\Models\SubMenu;
use Illuminate\Http\Request;
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
