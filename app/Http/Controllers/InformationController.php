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
                    $action = '<div class="btn-group" role="group"> <a href="'.url('information/'.$information['id'].'/edit').'" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </a>';
                    $action .= '<button class="btn btn-danger btn-sm" data-id="'.$information['id'].'" id="delete"> <i class="fas fa-trash"></i> </button> </div>';
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
        $information = null;
        return view('information.editor', compact('information'));
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
            'description' => 'required'
        ], [
            'description.required' => 'This field is required'
        ]);
        
        Information::create([
            'description' => $request->description
        ]);
        return redirect('information')->with('status', 'Data success created !');
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
        return redirect('information')->with('status', 'Data success updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Information::where('id', $id)->delete();
        return response()->json(['code' => 1, 'msg' => 'Data Has Been Deleted']);
    }
}
