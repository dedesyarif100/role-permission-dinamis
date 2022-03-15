<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $role = Role::orderBy('id', 'DESC')->get();
            return DataTables::of($role)
            ->addIndexColumn()
            ->addColumn('action', function($role) {
                $action = '<div class="btn-group" role="group"> <a href="'.url('admin/role/'.$role['id']).'" class="btn btn-success btn-sm"> <i class="fa fa-eye"></i> </a>';
                $action .= '<a href="'.url('admin/role/'.$role['id'].'/edit').'" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </a>';
                $action .= '<button class="btn btn-danger btn-sm" data-id="'.$role['id'].'" id="delete"> <i class="fas fa-trash"></i> </button> </div>';
                return $action;
            })
            ->rawColumns(['DT_Row_Index', 'action'])
            ->make(true);
        }

        return view('role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = null;
        return view('role.editor', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all(), $request->menu_view, $request->menu_create);
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'This field is required',
        ]);

        $role = Role::create([
            'name' => $request->name,
        ]);

        Permission::create([
            'role_id' => $role->id,
            'user_view' => $request->user_view === null ? 0 : 1,
            'user_create' => $request->user_create === null ? 0 : 1,
            'user_edit' => $request->user_edit === null ? 0 : 1,
            'user_delete' => $request->user_delete === null ? 0 : 1,
            'menu_view' => $request->menu_view === null ? 0 : 1,
            'menu_create' => $request->menu_create === null ? 0 : 1,
            'menu_edit' => $request->menu_edit === null ? 0 : 1,
            'menu_delete' => $request->menu_delete === null ? 0 : 1,
            'submenu_view' => $request->submenu_view === null ? 0 : 1,
            'submenu_create' => $request->submenu_create === null ? 0 : 1,
            'submenu_edit' => $request->submenu_edit === null ? 0 : 1,
            'submenu_delete' => $request->submenu_delete === null ? 0 : 1,
            'content_view' => $request->content_view === null ? 0 : 1,
            'content_create' => $request->content_create === null ? 0 : 1,
            'content_edit' => $request->content_edit === null ? 0 : 1,
            'content_delete' => $request->content_delete === null ? 0 : 1,
            'aboutus_view' => $request->aboutus_view === null ? 0 : 1,
            'aboutus_create' => $request->aboutus_create === null ? 0 : 1,
            'aboutus_edit' => $request->aboutus_edit === null ? 0 : 1,
            'aboutus_delete' => $request->aboutus_delete === null ? 0 : 1,
            'slideshow_view' => $request->slideshow_view === null ? 0 : 1,
            'slideshow_create' => $request->slideshow_create === null ? 0 : 1,
            'slideshow_edit' => $request->slideshow_edit === null ? 0 : 1,
            'slideshow_delete' => $request->slideshow_delete === null ? 0 : 1,
            'service_view' => $request->service_view === null ? 0 : 1,
            'service_create' => $request->service_create === null ? 0 : 1,
            'service_edit' => $request->service_edit === null ? 0 : 1,
            'service_delete' => $request->service_delete === null ? 0 : 1,
            'trusted_view' => $request->trusted_view === null ? 0 : 1,
            'trusted_create' => $request->trusted_create === null ? 0 : 1,
            'trusted_edit' => $request->trusted_edit === null ? 0 : 1,
            'trusted_delete' => $request->trusted_delete === null ? 0 : 1,
            'commentclient_view' => $request->commentclient_view === null ? 0 : 1,
            'commentclient_create' => $request->commentclient_create === null ? 0 : 1,
            'commentclient_edit' => $request->commentclient_edit === null ? 0 : 1,
            'commentclient_delete' => $request->commentclient_delete === null ? 0 : 1,
            'categorynews_view' => $request->categorynews_delete === null ? 0 : 1,
            'categorynews_create' => $request->categorynews_delete === null ? 0 : 1,
            'categorynews_edit' => $request->categorynews_delete === null ? 0 : 1,
            'categorynews_delete' => $request->categorynews_delete === null ? 0 : 1,
            'news_view' => $request->news_view === null ? 0 : 1,
            'news_create' => $request->news_create === null ? 0 : 1,
            'news_edit' => $request->news_edit === null ? 0 : 1,
            'news_delete' => $request->news_delete === null ? 0 : 1,
            'faq_view' => $request->faq_view === null ? 0 : 1,
            'faq_create' => $request->faq_create === null ? 0 : 1,
            'faq_edit' => $request->faq_edit === null ? 0 : 1,
            'faq_delete' => $request->faq_delete === null ? 0 : 1,
            'contactus_view' => $request->contactus_view === null ? 0 : 1,
            'contactus_create' => $request->contactus_create === null ? 0 : 1,
            'contactus_edit' => $request->contactus_edit === null ? 0 : 1,
            'contactus_delete' => $request->contactus_delete === null ? 0 : 1,
            'information_view' => $request->information_view === null ? 0 : 1,
            'information_create' => $request->information_create === null ? 0 : 1,
            'information_edit' => $request->information_edit === null ? 0 : 1,
            'information_delete' => $request->information_delete === null ? 0 : 1,
            'consultation_view' => $request->consultation_view === null ? 0 : 1,
            'consultation_create' => $request->consultation_create === null ? 0 : 1,
            'consultation_edit' => $request->consultation_edit === null ? 0 : 1,
            'consultation_delete' => $request->consultation_delete === null ? 0 : 1,
            'contactour_view' => $request->contactour_view === null ? 0 : 1,
            'contactour_create' => $request->contactour_create === null ? 0 : 1,
            'contactour_edit' => $request->contactour_edit === null ? 0 : 1,
            'contactour_delete' => $request->contactour_delete === null ? 0 : 1
        ]);

        return redirect('admin/role')->with('status', 'Data success created !');
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
    public function edit(Role $role)
    {
        return view('role.editor', compact('role'));
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
        // dd($request->all());
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'This field is required',
        ]);

        Role::where('id', $id)->update([
            'name' => $request->name,
        ]);
        $role = Role::find($id);

        Permission::where('id', $role->id)->update([
            'role_id' => $role->id,
            'user_view' => $request->user_view === null ? 0 : 1,
            'user_create' => $request->user_create === null ? 0 : 1,
            'user_edit' => $request->user_edit === null ? 0 : 1,
            'user_delete' => $request->user_delete === null ? 0 : 1,
            'menu_view' => $request->menu_view === null ? 0 : 1,
            'menu_create' => $request->menu_create === null ? 0 : 1,
            'menu_edit' => $request->menu_edit === null ? 0 : 1,
            'menu_delete' => $request->menu_delete === null ? 0 : 1,
            'submenu_view' => $request->submenu_view === null ? 0 : 1,
            'submenu_create' => $request->submenu_create === null ? 0 : 1,
            'submenu_edit' => $request->submenu_edit === null ? 0 : 1,
            'submenu_delete' => $request->submenu_delete === null ? 0 : 1,
            'content_view' => $request->content_view === null ? 0 : 1,
            'content_create' => $request->content_create === null ? 0 : 1,
            'content_edit' => $request->content_edit === null ? 0 : 1,
            'content_delete' => $request->content_delete === null ? 0 : 1,
            'aboutus_view' => $request->aboutus_view === null ? 0 : 1,
            'aboutus_create' => $request->aboutus_create === null ? 0 : 1,
            'aboutus_edit' => $request->aboutus_edit === null ? 0 : 1,
            'aboutus_delete' => $request->aboutus_delete === null ? 0 : 1,
            'slideshow_view' => $request->slideshow_view === null ? 0 : 1,
            'slideshow_create' => $request->slideshow_create === null ? 0 : 1,
            'slideshow_edit' => $request->slideshow_edit === null ? 0 : 1,
            'slideshow_delete' => $request->slideshow_delete === null ? 0 : 1,
            'service_view' => $request->service_view === null ? 0 : 1,
            'service_create' => $request->service_create === null ? 0 : 1,
            'service_edit' => $request->service_edit === null ? 0 : 1,
            'service_delete' => $request->service_delete === null ? 0 : 1,
            'trusted_view' => $request->trusted_view === null ? 0 : 1,
            'trusted_create' => $request->trusted_create === null ? 0 : 1,
            'trusted_edit' => $request->trusted_edit === null ? 0 : 1,
            'trusted_delete' => $request->trusted_delete === null ? 0 : 1,
            'commentclient_view' => $request->commentclient_view === null ? 0 : 1,
            'commentclient_create' => $request->commentclient_create === null ? 0 : 1,
            'commentclient_edit' => $request->commentclient_edit === null ? 0 : 1,
            'commentclient_delete' => $request->commentclient_delete === null ? 0 : 1,
            'categorynews_view' => $request->categorynews_delete === null ? 0 : 1,
            'categorynews_create' => $request->categorynews_delete === null ? 0 : 1,
            'categorynews_edit' => $request->categorynews_delete === null ? 0 : 1,
            'categorynews_delete' => $request->categorynews_delete === null ? 0 : 1,
            'news_view' => $request->news_view === null ? 0 : 1,
            'news_create' => $request->news_create === null ? 0 : 1,
            'news_edit' => $request->news_edit === null ? 0 : 1,
            'news_delete' => $request->news_delete === null ? 0 : 1,
            'faq_view' => $request->faq_view === null ? 0 : 1,
            'faq_create' => $request->faq_create === null ? 0 : 1,
            'faq_edit' => $request->faq_edit === null ? 0 : 1,
            'faq_delete' => $request->faq_delete === null ? 0 : 1,
            'contactus_view' => $request->contactus_view === null ? 0 : 1,
            'contactus_create' => $request->contactus_create === null ? 0 : 1,
            'contactus_edit' => $request->contactus_edit === null ? 0 : 1,
            'contactus_delete' => $request->contactus_delete === null ? 0 : 1,
            'information_view' => $request->information_view === null ? 0 : 1,
            'information_create' => $request->information_create === null ? 0 : 1,
            'information_edit' => $request->information_edit === null ? 0 : 1,
            'information_delete' => $request->information_delete === null ? 0 : 1,
            'consultation_view' => $request->consultation_view === null ? 0 : 1,
            'consultation_create' => $request->consultation_create === null ? 0 : 1,
            'consultation_edit' => $request->consultation_edit === null ? 0 : 1,
            'consultation_delete' => $request->consultation_delete === null ? 0 : 1,
            'contactour_view' => $request->contactour_view === null ? 0 : 1,
            'contactour_create' => $request->contactour_create === null ? 0 : 1,
            'contactour_edit' => $request->contactour_edit === null ? 0 : 1,
            'contactour_delete' => $request->contactour_delete === null ? 0 : 1
        ]);

        return redirect('admin/role')->with('status', 'Data success updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
