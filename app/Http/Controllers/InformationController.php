<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $information = Information::orderBy('id', 'DESC')->get();
            return DataTables::of($information)
                ->addIndexColumn()
                ->editColumn('description', function($information) {
                    return $information->description;
                })
                ->addColumn('action', function($information) {
                    $action = null;
                    if ( auth()->user()->userRole->role->permission->information_edit ) {
                        $action = '<a href="'.url('admin/information/'.$information['id'].'/edit').'" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </a>';
                    }
                    return $action;
                })
                ->rawColumns(['DT_Row_Index', 'description', 'action'])
                ->make(true);
        }
        return view('information.index');
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
    public function edit(Information $information)
    {
        return view('information.editor', compact('information'));
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
            'description' => 'required'
        ], [
            'description.required' => 'This field is required'
        ]);

        Information::where('id', $id)->update([
            'description' => $request->description
        ]);
        return redirect('admin/information')->with('status', 'Data success updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function accessUrl(Request $request)
    {
        if ( $request->route()->getName() === 'information.index' ) {
            if (auth()->user()->userRole->role->permission->information_view) {
                return $this->index($request);
            } else {
                return view('permission-access-page');
            }
        } elseif ( $request->route()->getName() === 'information.create' ) {
            if (auth()->user()->userRole->role->permission->information_create) {
                return $this->create();
            } else {
                return view('permission-access-page');
            }
        } elseif ( $request->route()->getName() === 'information.store' ) {
            return $this->store($request);
        } elseif ( $request->route()->getName() === 'information.edit' ) {
            if (auth()->user()->userRole->role->permission->information_edit) {
                $information = new Information();
                return $this->edit($information);
            } else {
                return view('permission-access-page');
            }
        } elseif ( $request->route()->getName() === 'information.update' ) {
            return $this->update($request, $request->id);
        } elseif ( $request->route()->getName() === 'information.delete' ) {
            if (auth()->user()->userRole->role->permission->information_delete) {
                return $this->destroy($request->id);
            } else {
                return view('permission-access-page');
            }
        }
    }
}
