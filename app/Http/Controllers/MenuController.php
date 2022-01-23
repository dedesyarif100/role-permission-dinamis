<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\Facades\DataTables;

class MenuController extends Controller
{
    public function editorMenu(Request $request)
    {
        $menu = Menu::find($request->menuId);
        return view('menu.editor', compact('menu'));
    }

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
                $action = '<div class="btn-group" role="group"> <button class="btn btn-primary btn-sm" data-id="'.$menu['id'].'" id="edit"> <i class="fas fa-edit"></i> </button>';
                $action .= '<button class="btn btn-danger btn-sm" data-id="'.$menu['id'].'" id="delete" title="Delete"> <i class="fa fa-trash"></i> </button>';
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
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            Menu::create([
                'name' => $request->name
            ]);
            return response()->json(['code' => 1, 'msg' => 'New Menu has been successfully saved']);
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
            'name' => ['required']
        ]);

        if ($validator->fails()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            Menu::where('id', $id)->update([
                'name' => $request->name,
            ]);
            return response()->json(['code' => 1, 'msg' => 'Menu Has Been Updated']);
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
        Menu::where('id', $id)->delete();
        return response()->json(['code' => 1, 'msg' => 'Menu Has Been Deleted']);
    }
}
