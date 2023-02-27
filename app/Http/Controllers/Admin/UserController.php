<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use App\Helpers\LogActivity;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::orderBy('name', 'ASC')->get();
        $roles = Role::all();


        return view('admin.users.index', [
            'users' => $users,
            'roles' => $roles
        ]);
    }

    public function profile()
    {

        LogActivity::addToLog(' ', 'Akses halaman profil');
        $this->middleware('guest')->except('logout');

        return view('customer.profile', ['profile' => Auth::user()]);
    }

    public function updateProfile(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'username' => 'required',
        //     'old_password' => 'required',
        //     'new_password' => 'required|different:old_password',
        // ]);



        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->old_password, $hashedPassword)) {

            if (!Hash::check($request->new_password, $hashedPassword)) {
                $user = Auth::user();
                $user->name = $request->name;
                $user->nick_name = $request->nick_name;
                $user->no_hp = $request->no_hp;
                $user->address = $request->address;
                $user->password = bcrypt($request->new_password);
                $user->updated_at = now();
                $user->save();

                $data['success'] = 'Set new password successfully.';
                return redirect()->back()->with($data);
            } else {
                $data['error'] = 'New password cannot be the same as old password.';
                return redirect()->back()->with($data);
            }
        } else {
            $data['error'] = 'Current password not match.';
            return redirect()->back()->with($data);
        }
    }

    public function listRole()
    {
        $roles = Role::with('permissions')->get();


        $permissions = Permission::all();
        return view('admin.role.index', [
            'roles' => $roles,
            'permissions' => $permissions
        ]);
    }



    public function editRole(Request $request, $id)
    {
        $role = Role::find($id);

        //Default, set dua buah variable dengan nilai null
        $permissions = null;
        $hasPermission = null;

        //Mengambil data role
        $roles = Role::all()->pluck('name');

        //apabila parameter role terpenuhi
        if (!empty($role)) {

            //Query untuk mengambil permission yang telah dimiliki oleh role terkait
            $hasPermission = DB::table('role_has_permissions')
                ->select('permissions.name')
                ->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
                ->where('role_id', $id)->get()->pluck('name')->all();



            // Mengambil data permission
            $permissions = Permission::pluck('name', 'id');
        }

        // dd($hasPermission, $permissions);

        return view('admin.role.edit', [
            'role' => $role,
            'permissions' => $permissions,
            'hasPermission' => $hasPermission
        ]);
    }



    public function createRole(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:roles'
        ]);
        $role = Role::create(['name' => $request->name]);

        return redirect()->back();
    }

    public function updateRole(Request $request, $id)
    {
        $role = Role::find($id);
        $role->name = $request->name;
        $role->save();
        $role->syncPermissions($request->permission_name);

        return redirect()->route('admin.list.role');
    }

    public function deleteRole($id)
    {
        $role = Role::find($id);
        $role->delete($role);
        return redirect()->route('admin.list.role');
    }
    public function listPermission()
    {
        $permissions = Permission::all();

        return view('admin.permission.index', [
            'permissions' => $permissions
        ]);
    }

    public function createPermission(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:permissions'
        ]);

        $permission = Permission::firstOrCreate([
            'name' => $request->name
        ]);
        return redirect()->back();
    }

    public function updatePermission(Request $request, $id)
    {
        $permission = Permission::find($id);
        $permission->name = $request->name;
        $permission->save();

        return redirect()->route('admin.list.permission');
    }

    public function deletePermission($id)
    {
        $permission = Permission::find($id);
        $permission->delete($permission);
        return redirect()->route('admin.list.permission');
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
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|string|unique:users',
            'roles' => 'required'
        ]);

        $new_user = new User;
        $new_user->name = $request->name;
        $new_user->email = $request->email;
        $new_user->password = bcrypt(Str::random(9));
        $new_user->save();

        $new_user->assignRole($request->roles);

        $new_user->save();

        return redirect()->route('admin.list.users')->with(['success' => 'Sukses Menambahkan Data User Baru']);
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
        $users = User::find($id);

        $permissions = Permission::all();
        $roles = Role::all();

        return view('admin.users.edit', [
            'users' => $users,
            'permissions' => $permissions,
            'roles' => $roles
        ]);
    }

    public function updatePermissionUser($id, Request $request)
    {
        $user = User::find($id);

        $user->update([
            'name' => $request->name,
            'nick_name' => $request->nick_name,
            'email' => $request->email,
            'status' => $request->status,
            'no_hp' => $request->no_hp,
            'address' => $request->address
        ]);
        $user->syncRoles($request->roles);

        // $user->givePermissionTo($request->permissions);
        $user->syncPermissions($request->permissions);



        $user->save();
        return redirect()->back()->with(['success' => 'Berhasil Mengubah Data']);
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
        $user = User::find($id);

        $user->syncRoles($request->roles);

        $user->save();

        return redirect()->back()->with(['success' => 'Berhasil Mengubah']);
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
        $user = User::find($id);

        $user->delete($user);

        return redirect()->route('admin.list.users');
    }
}
