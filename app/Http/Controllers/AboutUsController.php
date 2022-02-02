<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $aboutUs = AboutUs::orderBy('id', 'DESC')->get();
            return DataTables::of($aboutUs)
            ->addIndexColumn()
            ->addColumn('action', function($aboutUs) {
                $action = '<div class="btn-group" role="group"> <a href="'.url('admin/about-us/'.$aboutUs['id']).'" class="btn btn-success btn-sm"> <i class="fa fa-eye"></i> </a>';
                $action .= '<a href="'.url('admin/about-us/'.$aboutUs['id'].'/edit').'" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </a>';
                $action .= '<button class="btn btn-danger btn-sm" data-id="'.$aboutUs['id'].'" id="delete"> <i class="fas fa-trash"></i> </button>';
                return $action;
            })
            ->rawColumns(['DT_Row_Index', 'action'])
            ->make(true);
        }

        return view('about-us.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aboutUs = null;
        return view('about-us.editor', compact('aboutUs'));
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
            'title' => 'required',
            'description' => 'required',
            'image' => 'required'
        ], [
            'title.required' => 'This field is required',
            'description.required' => 'This field is required',
            'image.required' => 'This field is required'
        ]);

        $outputFile = 'about-us';
        $path = Storage::disk('public')->put($outputFile, $request->image);

        AboutUs::create([
            'title' => $request->title,
            'description' => $request->description,
            'whatsapp_number' => $request->whatsapp_number,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
            'facebook' => $request->facebook,
            'image' => $path
        ]);

        return redirect('admin/about-us')->with('status', 'Data success created !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aboutUs = AboutUs::find($id);
        return view('about-us.detail', compact('aboutUs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aboutUs = AboutUs::find($id);
        return view('about-us.editor', compact('aboutUs'));
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
            'title' => 'required',
            'description' => 'required',
            'image' => 'required'
        ], [
            'title.required' => 'This field is required',
            'description.required' => 'This field is required',
            'image.required' => 'This field is required'
        ]);

        $aboutUs = AboutUs::find($id);

        $outputFile = 'about-us';
        Storage::disk('public')->delete($outputFile, $aboutUs->image);

        $outputFile = 'about-us';
        $path = Storage::disk('public')->put($outputFile, $request->image);

        AboutUs::where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'whatsapp_number' => $request->whatsapp_number,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
            'facebook' => $request->facebook,
            'image' => $path
        ]);

        return redirect('admin/about-us')->with('status', 'Data success updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aboutUs = AboutUs::find($id);
        $outputFile = 'about-us';
        Storage::disk('public')->delete($outputFile, $aboutUs->image);
        AboutUs::where('id', $aboutUs->id)->delete();
        return response()->json(['code' => 1, 'msg' => 'Data Has Been Deleted']);
    }
}
