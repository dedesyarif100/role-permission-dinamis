<?php

namespace App\Http\Controllers;

use App\Models\SlideShow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class SlideShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $slideShow = SlideShow::orderBy('id', 'DESC')->get();
            return DataTables::of($slideShow)
            ->addIndexColumn()
            ->editColumn('is_active', function($slideShow) {
                if ( $slideShow->is_active == 0 ) {
                    $is_active = '<span class="name badge bg-danger" style="color: white;"> Tidak Aktif </span>';
                } else {
                    $is_active = '<span class="name badge bg-success" style="color: white;"> Aktif </span>';
                }
                return $is_active;
            })
            ->addColumn('action', function($slideShow) {
                $action = '<div class="btn-group" role="group"> <a href="'.url('slide-show/'.$slideShow['id']).'" class="btn btn-success btn-sm"> <i class="fa fa-eye"></i> </a>';
                $action .= '<a href="'.url('slide-show/'.$slideShow['id'].'/edit').'" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </a>';
                $action .= '<button class="btn btn-danger btn-sm" data-id="'.$slideShow['id'].'" id="delete" title="Delete"> <i class="fa fa-trash"></i> </button> </div>';
                return $action;
            })
            ->rawColumns(['DT_Row_Index', 'is_active', 'action'])
            ->make(true);
        }

        return view('slide-show.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slideShow = null;
        return view('slide-show.editor', compact('slideShow'));
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
            'description' => 'required',
            'image' => 'required'
        ], [
            'description.required' => 'This field is required',
            'image.required' => 'This field is required'
        ]);

        $outputFile = 'slide-show';
        $path = Storage::disk('public')->put($outputFile, $request->image);

        SlideShow::create([
            'description' => $request->description,
            'image' => $path,
            'is_active' => 1
        ]);

        return redirect('slide-show')->with('status', 'Data success created !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SlideShow $slideShow)
    {
        return view('slide-show.detail', compact('slideShow'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SlideShow $slideShow)
    {
        return view('slide-show.editor', compact('slideShow'));
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
            'description' => 'required',
            'image' => 'required'
        ], [
            'description.required' => 'This field is required',
            'image.required' => 'This field is required'
        ]);

        $slideShow = SlideShow::find($id);

        $outputFile = 'slide-show';
        Storage::disk('public')->delete($outputFile, $slideShow->image);

        $outputFile = 'slide-show';
        $path = Storage::disk('public')->put($outputFile, $request->image);

        SlideShow::where('id', $id)->update([
            'description' => $request->description,
            'image' => $path,
            'is_active' => is_null($request->is_active) ? '0' : '1'
        ]);

        return redirect('slide-show')->with('status', 'Data success updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SlideShow $slideShow)
    {
        $outputFile = 'slide-show';
        Storage::disk('public')->delete($outputFile, $slideShow->image);
        SlideShow::where('id', $slideShow->id)->delete();
        return response()->json(['code' => 1, 'msg' => 'Data Has Been Deleted']);
    }
}
