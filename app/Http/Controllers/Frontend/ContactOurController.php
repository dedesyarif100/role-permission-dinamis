<?php

namespace App\Http\Controllers\Frontend;

use App\Models\ContactOur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class ContactOurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $contactOur = ContactOur::orderBy('id', 'DESC')->get();
            return DataTables::of($contactOur)
                ->addIndexColumn()
                ->editColumn('name', function($contactOur) {
                    if ($contactOur->read_at == null) {
                        return '<strong>'.$contactOur->name.'</strong>';
                    } else {
                        return $contactOur->name;
                    }
                })
                ->editColumn('email', function($contactOur) {
                    if ($contactOur->read_at == null) {
                        return '<strong>'.$contactOur->email.'</strong>';
                    } else {
                        return $contactOur->email;
                    }
                })
                ->editColumn('phone', function($contactOur) {
                    if ($contactOur->read_at == null) {
                        return '<strong>'.$contactOur->phone.'</strong>';
                    } else {
                        return $contactOur->phone;
                    }
                })
                ->editColumn('subject', function($contactOur) {
                    if ($contactOur->read_at == null) {
                        return '<strong>'.$contactOur->subject.'</strong>';
                    } else {
                        return $contactOur->subject;
                    }
                })
                ->addColumn('action', function($contactOur) {
                    $action = '<div class="btn-group" role="group"> <a href="'.url('admin/contact-our/'.$contactOur['id']).'" class="btn btn-success btn-sm"> <i class="fa fa-eye"></i> </a>';
                    $action .= '<a href="'.url('admin/contact-our/'.$contactOur['id'].'/edit').'" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </a>';
                    $action .= '<button class="btn btn-danger btn-sm" data-id="'.$contactOur['id'].'" id="delete"> <i class="fas fa-trash"></i> </button> </div>';
                    return $action;
                })
                ->rawColumns(['DT_Raw_Index', 'name', 'email', 'phone', 'subject', 'action'])
                ->make(true);
        }
        return view('contact-our.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        ContactOur::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message
        ]);

        Session::flash('success');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        ContactOur::where('id', $id)->update([
            'read_at' => now()
        ]);

        $contactOur = ContactOur::find($id);
        return view('contact-our.detail', compact('contactOur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contactOur = ContactOur::find($id);
        return view('contact-our.editor', compact('contactOur'));
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        ContactOur::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message
        ]);

        return redirect('admin/contact-our')->with('status', 'Data success updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ContactOur::where('id', $id)->delete();
        return response()->json(['code' => 1, 'msg' => 'Data Has Been Deleted']);
    }
}
