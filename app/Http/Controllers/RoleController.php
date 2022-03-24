<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        // $user = new User();
        // dd($user->can('view', $user));
        // $role = Role::find(1);
        // dd($this->authorize('view', $role));

        if ($request->ajax()) {
            $role = Role::orderBy('id', 'DESC')->get();
            return DataTables::of($role)
            ->addIndexColumn()
            ->addColumn('action', function($role) {
                $action = '<div class="btn-group" role="group"> <a href="'.url('admin/permission/'.$role['id']).'" class="btn btn-success btn-sm"> <i class="fa fa-calendar"></i> </a>';
                $action .= '<div class="btn-group" role="group"> <a href="'.url('admin/role/'.$role['id']).'" class="btn btn-success btn-sm"> <i class="fa fa-eye"></i> </a>';
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

        Role::create([
            'name' => $request->name,
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
        $role = Role::find($id)->permissions()->where('permissions.id', 2)->get();
        $role = Role::find($id)->permissions()->orderBy('permissions.id', 'DESC')->get();
        $role = Role::find($id);
        $role = Role::find($id)->permissionWithTimeStamp->toArray();
        $role = Role::find($id)->permissionWithAsTimeStamp;
        // $role = Role::find($id)->with('permissionWithAsTimeStamp')->get();
        // DB::enableQueryLog();
        $role = Role::find($id)->permissionWithUsing;
        // $query = DB::getQueryLog();
        dd($role);

        $permissionName = [];
        foreach ($role as $permission) {
            // dd($permission->pivot->created_at->format('Y-m-d'));
            dd($permission->permissionWithAs->created_at->format('Y-m-d'));
            $permissionName[] = $permission->name;
        }
        dd($permissionName);
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
    public function update(Request $request, Role $role)
    {
        $this->authorize('update', [$role, 'superadmin']);
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'This field is required',
        ]);

        Role::where('id', $role->id)->update([
            'name' => $request->name,
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
