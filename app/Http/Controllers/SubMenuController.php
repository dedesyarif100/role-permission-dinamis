<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Menu;
use App\Models\SubMenu;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SubMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $subMenu = SubMenu::orderBy('id', 'DESC')->get();
            return DataTables::of($subMenu)
            ->addIndexColumn()
            ->editColumn('menu', function($subMenu) {
                return $subMenu->menu->name;
            })
            ->addColumn('action', function($subMenu) {
                $action = '<div class="btn-group" role="group"> <a href="'.url('admin/submenu/'.$subMenu['id'].'/edit').'" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </a>';
                if ( Content::where('sub_menu_id', $subMenu->id)->exists() ) {
                    $action .= '<button class="btn btn-danger btn-sm" disabled> <i class="fa fa-trash"></i> </button>';
                } else {
                    $action .= '<button class="btn btn-danger btn-sm" data-id="'.$subMenu['id'].'" id="delete" title="Delete"> <i class="fa fa-trash"></i> </button></div>';
                }
                return $action;
            })
            ->rawColumns(['DT_Row_Index', 'action'])
            ->make(true);
        }

        return view('sub-menu.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subMenu = null;
        $allMenu = Menu::all();
        return view('sub-menu.editor', compact('subMenu', 'allMenu'));
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
            'name' => 'required'
        ], [
            'menu_id.required' => 'This field is required',
            'name.required' => 'This field is required'
        ]);

        SubMenu::create([
            'menu_id' => $request->menu_id,
            'name' => $request->name
        ]);

        return redirect('admin/sub-menu')->with('status', 'Data success created!');
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
    public function edit(SubMenu $subMenu)
    {
        $allMenu = Menu::all();
        return view('sub-menu.editor', compact('subMenu', 'allMenu'));
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
            'name' => 'required'
        ], [
            'menu_id.required' => 'This field is required',
            'name.required' => 'This field is required'
        ]);

        SubMenu::where('id', $id)->update([
            'menu_id' => $request->menu_id,
            'name' => $request->name
        ]);

        return redirect('admin/sub-menu')->with('status', 'Data success updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubMenu::where('id', $id)->delete();
        return response()->json(['code' => 1, 'msg' => 'Sub Menu Has Been Deleted']);
    }

    public function accessUrl(Request $request)
    {
        if ( $request->route()->getName() === 'submenu.index' ) {
            if (auth()->user()->userRole->role->permission->submenu_view) {
                return $this->index($request);
            } else {
                return view('permission-access-page');
            }
        } elseif ( $request->route()->getName() === 'submenu.create' ) {
            if (auth()->user()->userRole->role->permission->submenu_create) {
                return $this->create();
            } else {
                return view('permission-access-page');
            }
        } elseif ( $request->route()->getName() === 'submenu.store' ) {
            return $this->store($request);
        } elseif ( $request->route()->getName() === 'submenu.edit' ) {
            if (auth()->user()->userRole->role->permission->submenu_edit) {
                $submenu = new SubMenu;
                return $this->edit($submenu);
            } else {
                return view('permission-access-page');
            }
        } elseif ( $request->route()->getName() === 'submenu.update' ) {
            return $this->update($request, $request->id);
        } elseif ( $request->route()->getName() === 'submenu.delete' ) {
            if (auth()->user()->userRole->role->permission->submenu_delete) {
                return $this->destroy($request->id);
            } else {
                return view('permission-access-page');
            }
        }
    }
}
