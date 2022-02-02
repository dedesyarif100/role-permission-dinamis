<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $service = Service::orderBy('id', 'DESC')->get();
            return DataTables::of($service)
            ->addIndexColumn()
            ->addColumn('action', function($service) {
                $action = '<div class="btn-group" role="group"> <a href="'.url('admin/service/'.$service['id']).'" class="btn btn-success btn-sm"> <i class="fa fa-eye"></i> </a>';
                $action .= '<a href="'.url('admin/service/'.$service['id']).'/edit" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </a>';
                $action .= '<button class="btn btn-danger btn-sm" data-id="'.$service['id'].'" id="delete" title="Delete"> <i class="fa fa-trash"></i> </button> </div>';
                return $action;
            })
            ->rawColumns(['DT_Row_Index', 'action'])
            ->make(true);
        }

        return view('service.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $service = null;
        return view('service.editor', compact('service'));
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
            'image' => 'required',
            'title' => 'required',
            'short_description' => 'required',
            'long_description' => 'required'
        ], [
            'image.required' => 'This field is required',
            'title.required' => 'This field is required',
            'short_description.required' => 'This field is required',
            'long_description.required' => 'This field is required'
        ]);

        $slugService = Service::generateSlugByTitle($request->title);

        $outputFile = 'service';
        $path = Storage::disk('public')->put($outputFile, $request->image);

        Service::create([
            'image' => $path,
            'title' => $request->title,
            'slug' => $slugService,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description
        ]);

        return redirect('admin/service')->with('status', 'Data success created !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return view('service.detail', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('service.editor', compact('service'));
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
            'image' => 'required',
            'title' => 'required',
            'short_description' => 'required',
            'long_description' => 'required'
        ], [
            'image.required' => 'This field is required',
            'title.required' => 'This field is required',
            'short_description.required' => 'This field is required',
            'long_description.required' => 'This field is required'
        ]);

        $slugService = Service::generateSlugByTitle($request->title);

        $service = Service::find($id);

        $outputFile = 'service';
        Storage::disk('public')->delete($outputFile, $service->image);

        $outputFile = 'service';
        $path = Storage::disk('public')->put($outputFile, $request->image);

        Service::where('id', $id)->update([
            'image' => $path,
            'title' => $request->title,
            'slug' => $slugService,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description
        ]);

        return redirect('admin/service')->with('status', 'Data success updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $outputFile = 'service';
        Storage::disk('public')->delete($outputFile, $service->image);
        Service::where('id', $service->id)->delete();
        return response()->json(['code' => 1, 'msg' => 'Data Has Been Deleted']);
    }
}
