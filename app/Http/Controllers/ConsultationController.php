<?php

namespace App\Http\Controllers;

use App\Models\Consultations;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $consultations = Consultations::orderBy('id', 'DESC')->get();
            return DataTables::of($consultations)
                ->addIndexColumn()
                ->addColumn('action', function($consultations) {
                    $action = '<div> <a href="'.url('consultation/'.$consultations['id']).'" class="btn btn-success btn-sm"> <i class="fa fa-eye"></i></a>';
                    if ( auth()->user()->userRole->role->permission->consultation_edit ) {
                        $action .= '<a href="'.url('consultation/'.$consultations['id'].'/edit').'" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </a>';
                    }
                    if ( auth()->user()->userRole->role->permission->consultation_delete ) {
                        $action .= '<button class="btn btn-danger btn-sm" data-id="'.$consultations['id'].'"> <i class="fas fa-trash"></i> </button> </div>';
                    }
                    return $action;
                })
                ->rawColumns(['DT_Row_Index', 'action'])
                ->make(true);
        }
        return view('consultation.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Consultations $consultations)
    {
        return view('consultation.detail', compact('consultations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Consultations $consultations)
    {
        return view('consultation.editor', compact('consultations'));
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
            'company' => 'required',
            'phone' => 'required',
            'message' => 'required',
            'consultation_type' => 'required',
        ]);

        Consultations::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'company' => $request->company,
            'phone' => $request->phone,
            'message' => $request->message,
            'consultation_type' => $request->consultation_type,
        ]);

        return redirect('consultation')->with('status', 'Data success updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Consultations::where('id', $id)->delete();
        return response()->json(['code' => 1, 'msg' => 'Data Has Been Deleted']);
    }

    public function accessUrl(Request $request)
    {
        if ( $request->route()->getName() === 'consultationdata.index' ) {
            if (auth()->user()->userRole->role->permission->consultation_view) {
                return $this->index($request);
            } else {
                return view('permission-access-page');
            }
        } elseif ( $request->route()->getName() === 'consultationdata.create' ) {
            if (auth()->user()->userRole->role->permission->consultation_create) {
                return $this->create();
            } else {
                return view('permission-access-page');
            }
        } elseif ( $request->route()->getName() === 'consultationdata.store' ) {
            return $this->store($request);
        } elseif ( $request->route()->getName() === 'consultationdata.edit' ) {
            if (auth()->user()->userRole->role->permission->consultation_edit) {
                $consultation = new Consultations();
                return $this->edit($consultation);
            } else {
                return view('permission-access-page');
            }
        } elseif ( $request->route()->getName() === 'consultationdata.update' ) {
            return $this->update($request, $request->id);
        } elseif ( $request->route()->getName() === 'consultationdata.delete' ) {
            if (auth()->user()->userRole->role->permission->consultation_delete) {
                return $this->destroy($request->id);
            } else {
                return view('permission-access-page');
            }
        }
    }
}
