<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $faq = Faq::orderBy('id', 'DESC')->get();
            return DataTables::of($faq)
                ->addIndexColumn()
                ->addColumn('action', function($faq) {
                    $action = '<div class="btn-group" role="group"> <a href="'.url('admin/faq/'.$faq['id']).'" class="btn btn-success btn-sm"> <i class="fa fa-eye"></i> </a>';
                    $action .= '<a href="'.url('admin/faq/'.$faq['id'].'/edit').'" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </a>';
                    $action .= '<button class="btn btn-danger btn-sm" data-id="'.$faq['id'].'" id="delete"> <i class="fas fa-trash"></i> </button> </div>';
                    return $action;
                })
                ->rawColumns(['DT_Row_Index', 'action'])
                ->make(true);
        }

        return view('faq.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faq = null;
        return view('faq.editor', compact('faq'));
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
            'description' => 'required'
        ], [
            'title.required' => 'This field is required',
            'description.required' => 'This field is required'
        ]);

        Faq::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect('admin/faq')->with('status', 'Data success created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        $alias = (new Faq)->getMorphClass();
        dd(Relation::getMorphedModel($alias), $faq->faqMorphToMany->toArray());
        return view('faq.detail', compact('faq'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        return view('faq.editor', compact('faq'));
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
            'description' => 'required'
        ], [
            'title.required' => 'This field is required',
            'description.required' => 'This field is required'
        ]);

        Faq::where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect('admin/faq')->with('status', 'Data success updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Faq::where('id', $id)->delete();
        return response()->json(['code' => 1, 'msg' => 'Data Has Been Deleted']);
    }

    public function accessUrl(Request $request)
    {
        if ( $request->route()->getName() === 'faq.index' ) {
            if (auth()->user()->userRole->role->permission->faq_view) {
                return $this->index($request);
            } else {
                return view('permission-access-page');
            }
        } elseif ( $request->route()->getName() === 'faq.create' ) {
            if (auth()->user()->userRole->role->permission->faq_create) {
                return $this->create();
            } else {
                return view('permission-access-page');
            }
        } elseif ( $request->route()->getName() === 'faq.store' ) {
            return $this->store($request);
        } elseif ( $request->route()->getName() === 'faq.edit' ) {
            if (auth()->user()->userRole->role->permission->faq_edit) {
                $faq = new Faq();
                return $this->edit($faq);
            } else {
                return view('permission-access-page');
            }
        } elseif ( $request->route()->getName() === 'faq.update' ) {
            return $this->update($request, $request->id);
        } elseif ( $request->route()->getName() === 'faq.delete' ) {
            if (auth()->user()->userRole->role->permission->faq_delete) {
                return $this->destroy($request->id);
            } else {
                return view('permission-access-page');
            }
        }
    }
}
