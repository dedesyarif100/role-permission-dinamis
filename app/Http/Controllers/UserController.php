<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $user = User::orderBy('id', 'DESC')->get();
            return DataTables::of($user)
                ->addIndexColumn()
                ->addColumn('role', function($user) {
                    return $user->userRole->role->name;
                })
                ->addColumn('action', function($user) {
                    $action = '<div class="btn-group" role="group"> <a href="'.url('user/'.$user['id']).'" class="btn btn-success btn-sm"> <i class="fa fa-eye"></i> </a>';
                    $action .= '<a href="'.url('user/'.$user['id'].'/edit').'" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </a>';
                    $action .= '<button class="btn btn-danger btn-sm" data-id="'.$user['id'].'" id="delete"> <i class="fas fa-trash"></i> </button> </div>';
                    return $action;
                })
                ->rawColumns(['DT_Raw_Column', 'action'])
                ->make(true);
        }
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = null;
        $roles = Role::all();
        return view('user.editor', compact('user', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role_id' => 'required'
        ], [
            'name.required' => 'This field is required',
            'email.required' => 'This field is required',
            'password.required' => 'This field is required',
            'role_id.required' => 'This field is required',
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        UserRole::create([
            'user_id' => $user->id,
            'role_id' => $request->role_id
        ]);

        return redirect('user')->with('status', 'Data success created !');
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
        //
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
        //
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
