<?php

namespace App\Http\Controllers;

use App\Models\Trusted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class TrustedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $trusted = Trusted::orderBy('id', 'DESC')->get();
            return DataTables::of($trusted)
            ->addIndexColumn()
            ->editColumn('image', function($trusted) {
                $image = '<img src="'.asset('storage/'.$trusted->image).'" width="100" height="100" style="object-fit: contain;">';
                return $image;
            })
            ->addColumn('action', function($trusted) {
                $action = '<div class="btn-group" role="group"> <a href="'.url('trusted/'.$trusted['id'].'/edit').'" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </a>';
                $action .= '<button class="btn btn-danger btn-sm" data-id="'.$trusted['id'].'" id="delete"> <i class="fas fa-trash"></i> </button> </div>';
                return $action;
            })
            ->rawColumns(['DT_Row_Index', 'image', 'action'])
            ->make(true);
        }

        return view('trusted.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trusted = null;
        return view('trusted.editor', compact('trusted'));
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
            'image' => 'required'
        ], [
            'image.required' => 'This field is required'
        ]);

        $outputFile = 'trusted';
        $path = Storage::disk('public')->put($outputFile, $request->image);

        Trusted::create([
            'image' => $path,
        ]);

        return redirect('trusted')->with('status', 'Data success created !');
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
    public function edit(Trusted $trusted)
    {
        return view('trusted.editor', compact('trusted'));
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
            'image' => 'required'
        ], [
            'image.required' => 'This field is required'
        ]);

        $trusted = Trusted::find($id);

        $outputFile = 'trusted';
        Storage::disk('public')->delete($outputFile, $trusted->image);

        $outputFile = 'trusted';
        $path = Storage::disk('public')->put($outputFile, $request->image);

        Trusted::where('id', $id)->update([
            'image' => $path
        ]);

        return redirect('trusted')->with('status', 'Data success updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trusted $trusted)
    {
        $outputFile = 'trusted';
        Storage::disk('public')->delete($outputFile, $trusted->image);
        Trusted::where('id', $trusted->id)->delete();
        return response()->json(['code' => 1, 'msg' => 'Data Has Been Deleted']);
    }
}
