<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $contactUs = ContactUs::orderBy('id', 'DESC')->get();
            return DataTables::of($contactUs)
                ->addIndexColumn()
                ->addColumn('action', function($contactUs) {
                    $action = '<div class="btn-group" role="group"> <a href="'.url('contact-us/'.$contactUs['id'].'/edit').'" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </a>';
                    $action .= '<button class="btn btn-danger btn-sm" data-id="'.$contactUs['id'].'" id="delete"> <i class="fas fa-trash"></i> </button> </div>';
                    return $action;
                })
                ->rawColumns(['DT_Row_Index', 'action'])
                ->make(true);
        }

        return view('contact-us.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contactUs = null;
        return view('contact-us.editor', compact('contactUs'));
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
        ], [
            'title.required' => 'This field is required',
            'description.required' => 'This field is required'
        ]);

        ContactUs::create([
            'icon' => $request->icon,
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
            'link' => $request->link
        ]);

        return redirect('contact-us')->with('status', 'Data success created !');
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
        $contactUs = ContactUs::find($id);
        return view('contact-us.editor', compact('contactUs'));
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
        ], [
            'title.required' => 'This field is required',
            'description.required' => 'This field is required'
        ]);

        ContactUs::where('id', $id)->update([
            'icon' => $request->icon,
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
            'link' => $request->link
        ]);

        return redirect('contact-us')->with('status', 'Data success updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ContactUs::where('id', $id)->delete();
        return response()->json(['code' => 1, 'msg' => 'Data Has Been Deleted']);
    }
}
