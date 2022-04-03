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
                $action = null;
                $action = '<a href="'.url('admin/about-us/'.$aboutUs['id'].'/edit').'" class="btn btn-primary btn-sm" id="edit"> <i class="fa fa-edit"></i> </a>';
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

    }

    public function accessUrl(Request $request)
    {
        if ( $request->route()->getName() === 'aboutus.index' ) {
            if (auth()->user()->userRole->role->permission->aboutus_view) {
                return $this->index($request);
            } else {
                return view('permission-access-page');
            }
        } elseif ( $request->route()->getName() === 'aboutus.create' ) {
            if (auth()->user()->userRole->role->permission->aboutus_create) {
                return $this->create();
            } else {
                return view('permission-access-page');
            }
        } elseif ( $request->route()->getName() === 'aboutus.store' ) {
            return $this->store($request);
        } elseif ( $request->route()->getName() === 'aboutus.edit' ) {
            if (auth()->user()->userRole->role->permission->aboutus_edit) {
                $aboutus = new AboutUs();
                return $this->edit($aboutus);
            } else {
                return view('permission-access-page');
            }
        } elseif ( $request->route()->getName() === 'aboutus.update' ) {
            return $this->update($request, $request->id);
        } elseif ( $request->route()->getName() === 'aboutus.delete' ) {
            if (auth()->user()->userRole->role->permission->aboutus_delete) {
                return $this->destroy($request->id);
            } else {
                return view('permission-access-page');
            }
        }
    }
}
