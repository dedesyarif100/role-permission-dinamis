<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        // dd($id, $request->all());
        $permission = null;
        if ($request->ajax()) {
            $rolePermission = RolePermission::where('role_id', $id)->get();
            return DataTables::of($rolePermission)
                ->addIndexColumn()
                ->editColumn('permission', function($rolePermission) {
                    // dd($rolePermission['permission_id']);
                    return $rolePermission->permission->name;
                })
                ->addColumn('action', function($rolePermission) {
                    $action = '<div class="btn-group" role="group"> <button class="btn btn-primary btn-sm" data-id="'.$rolePermission['permission_id'].'" id="edit" title="Edit"><i class="fas fa-edit"></i></button>';
                    $action .= '<button class="btn btn-danger btn-sm" data-id="'.$rolePermission['permission_id'].'" id="delete"> <i class="fas fa-trash"></i> </button>';
                    $action .= '<button class="btn btn-success btn-sm" data-name="'.$rolePermission->permission->name.'" id="getRoleName"> <i class="fas fa-trash"></i> </button> </div>';
                    return $action;
                })
                ->rawColumns(['permission', 'action'])
                ->make(true);
        }
        $role = Role::find($id);
        return view('role.permissioncreate', ['permission' => $permission, 'role' => $role]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
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
        $permission = Permission::create([
            'name' => $request->name
        ]);

        RolePermission::create([
            'role_id' => Auth::user()->userRoles[0]->id,
            'permission_id' => $permission->id
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
        dd($id);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editPermission(Request $request)
    {
        // dd($request['permissionId']);
        $permission = Permission::find($request['permissionId']);
        return view('role.editorpermission', ['permission' => $permission]);
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
        Permission::where('id', $id)->update([
            'name' => $request->name
        ]);

        return response()->json([
            'code' => 1,
            'msg' => 'Data hasbeen update'
        ]);
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
