<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function __construct()
    {
        // $request = new Request();

        // $user = new User();
        // $response = Gate::inspect('view', $user->all());
        // dd($response->allowed());

        // $this->middleware('log')->only('index');
        // $this->middleware('subscribed')->except('store');

        $this->middleware('permission:user view,user create,user store,user edit,user update,user destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $role = new Role();
        $user = new User();
        // dd(
        //     // $request->all(),
        //     // Gate::allows('isSuperAdmin'),
        //     // $user->can('create', $user),
        //     // $this->authorize('view', $user),
        //     // $user->can('view', $user),
        //     // $role->can('create', $role),
        //     // $role->can('view', $role),
        //     // Gate::allows('role', 'superadmin') || Gate::allows('role', 'admin')
        // );
        if ( Gate::allows('role', 'superadmin') || Gate::allows('role', 'admin') ) {
            if ($request->ajax()) {
                $user = User::orderBy('id', 'ASC')->get();
                // dd($user[0]->userRoles->toArray());
                $role = Role::where('name', 'user')->first();
                return DataTables::of($user)
                    ->addIndexColumn()
                    ->addColumn('role', function($user) {
                        // dd($user->userRoles->toArray(), $user->userRoles()->where('user_id', $user->id)->get()->toArray());
                        if ( $user->userRoles->count() !== 1 ) {
                            $apply = [];
                            foreach ($user->userRoles as $value) {
                                if ( $value->name === 'superadmin' ) {
                                    $apply[] = '<span class="name badge bg-success" style="color: white;">'.$value->name.'</span>';
                                } elseif ( $value->name === 'admin' ) {
                                    $apply[] = '<span class="name badge bg-primary" style="color: white;">'.$value->name.'</span>';
                                } else {
                                    $apply[] = '<span class="name badge bg-info" style="color: white;">'.$value->name.'</span>';
                                }
                            }
                            return implode('<br>', $apply);
                        } else {
                            foreach ($user->userRoles as $value) {
                                if ( $value->name === 'superadmin' ) {
                                    return '<span class="name badge bg-success" style="color: white;">'.$value->name.'</span>';
                                } elseif ( $value->name === 'admin' ) {
                                    return '<span class="name badge bg-primary" style="color: white;">'.$value->name.'</span>';
                                } else {
                                    return '<span class="name badge bg-info" style="color: white;">'.$value->name.'</span>';
                                }
                            }
                        }
                    })
                    ->addColumn('action', function($user) {
                        $action = null;
                        if ( Gate::allows('role', 'superadmin') ) {
                            $action = '<div class="btn-group" role="group"> <a href="'.url('admin/user/'.$user['id'].'/edit').'" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </a>';
                            if (auth()->user()->id === $user->id) {
                                $action .= '<button class="btn btn-danger btn-sm" disabled> <i class="fas fa-trash"></i> </button> </div>';
                            } else {
                                $action .= '<button class="btn btn-danger btn-sm" data-id="'.$user['id'].'" id="delete"> <i class="fas fa-trash"></i> </button> </div>';
                            }
                        }
                        return $action;
                    })
                    ->rawColumns(['DT_Raw_Column', 'role', 'action'])
                    ->make(true);
            }
            return view('user.index');
        } else {
            return view('permission-access-page');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ( Gate::allows('role', 'superadmin') ) {
            $user = null;
            $roles = Role::all();
            return view('user.editor', compact('user', 'roles'));
        } else {
            return view('permission-access-page');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ( Gate::allows('role', 'superadmin') ) {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'password_confirmation' => 'required',
                'role_id' => 'required'
            ], [
                'name.required' => 'This field is required',
                'email.required' => 'This field is required',
                'password.required' => 'This field is required',
                'password_confirmation.required' => 'This field is required',
                'role_id.required' => 'This field is required',
            ]);

            // dd($request->all());
            if ($request->password !== $request->password_confirmation) {
                return redirect()->back()->with('status', 'Password Confirmasi harus sama');
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            UserRole::create([
                'user_id' => $user->id,
                'role_id' => $request->role_id
            ]);

            return redirect('admin/user')->with('status', 'Data success created !');
        } else {
            abort(403);
        }
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if ( Gate::allows('role', 'superadmin') ) {
            $roles = Role::all();
            return view('user.editor', compact('user', 'roles'));
        } else {
            return view('permission-access-page');
        }
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
        if ( Gate::allows('role', 'superadmin') ) {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'role_id' => 'required'
            ], [
                'name.required' => 'This field is required',
                'email.required' => 'This field is required',
                'role_id.required' => 'This field is required',
            ]);

            User::where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
            $user = User::find($id);

            UserRole::where('user_id', $user->id)->update([
                'role_id' => $request->role_id
            ]);

            return redirect('admin/user')->with('status', 'Data success updated !');
        } else {
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ( Gate::allows('role', 'superadmin') ) {
            User::where('id', $id)->delete();
            return response()->json(['code' => 1, 'msg' => 'Data Has Been Deleted']);
        } else {
            abort(403);
        }
    }

    public function accessUrl(Request $request)
    {
        // dd(auth()->user()->userRole);
        if ( $request->route()->getName() === 'user.index' ) {
            if (auth()->user()->userRole->role->permission->user_view) {
                return $this->index($request);
            } else {
                return view('permission-access-page');
            }
        } elseif ( $request->route()->getName() === 'user.create' ) {
            if (auth()->user()->userRole->role->permission->user_create) {
                return $this->create();
            } else {
                return view('permission-access-page');
            }
        } elseif ( $request->route()->getName() === 'user.store' ) {
            if (auth()->user()->userRole->role->permission->user_create) {
                return $this->store($request);
            } else {
                return view('permission-access-page');
            }
        } elseif ( $request->route()->getName() === 'user.edit' ) {
            if (auth()->user()->userRole->role->permission->user_edit) {
                $user = new User();
                return $this->edit($user);
            } else {
                return view('permission-access-page');
            }
        } elseif ( $request->route()->getName() === 'user.update' ) {
            return $this->update($request, $request->id);
        } elseif ( $request->route()->getName() === 'user.delete' ) {
            if (auth()->user()->userRole->role->permission->user_delete) {
                return $this->destroy($request->id);
            } else {
                return view('permission-access-page');
            }
        }
    }
}
