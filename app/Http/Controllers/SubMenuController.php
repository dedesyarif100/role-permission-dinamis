<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\SubMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class SubMenuController extends Controller
{
    public function editorSubMenu(Request $request)
    {
        $subMenu = SubMenu::find($request->subMenuId);
        $allMenu = Menu::all();
        return view('sub-menu.editor', compact('subMenu', 'allMenu'));
    }

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
                $action = '<div class="btn-group" role="group"> <button class="btn btn-primary btn-sm" data-id="'.$subMenu['id'].'" id="edit"> <i class="fas fa-edit"></i> </button>';
                $action .= '<button class="btn btn-danger btn-sm" data-id="'.$subMenu['id'].'" id="delete" title="Delete"> <i class="fa fa-trash"></i> </button>';
                return $action;
            })
            ->rawColumns(['DT_Row_Index', 'action'])
            ->make(true);
        }

        return view('sub-menu.index');
    }

    public function getSubMenu()
    {

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
            'menu_id' => ['required'],
            'name' => ['required']
        ]);

        if ($validator->fails()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            SubMenu::create([
                'menu_id' => $request->menu_id,
                'name' => $request->name
            ]);
            return response()->json(['code' => 1, 'msg' => 'New Sub Menu has been successfully saved']);
        }
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
        $validator = Validator::make($request->all(), [
            'menu_id' => ['required'],
            'name' => ['required']
        ]);

        if ($validator->fails()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            SubMenu::where('id', $id)->update([
                'menu_id' => $request->menu_id,
                'name' => $request->name
            ]);
            return response()->json(['code' => 1, 'msg' => 'Sub Menu Has Been Updated']);
        }
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
}
