<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\PermissionGroup;
use App\Models\AdminPermission;
use App\Models\AdminType;
use App\Http\Requests\Admins\StoreAdminRequest;
use App\Http\Requests\Admins\UpdateAdminRequest;
use Auth;
use Storage;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $admins = Admin::withCount('dailyTrips')->latest()->get();
        return view('board.admins.index' , compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = PermissionGroup::with('permissions')->get();  
        $types = AdminType::where('active' , 1)->get();
        return view('board.admins.create' , compact('groups' , 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminRequest $request)
    {
        $admin = new Admin;

        if (!$admin->add($request->all())) 
            return back()->with('error_msg'  , trans('admins.adding_error') );


        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('admins', 's3');
            $admin->setImage(basename($path));
        }

        
        if ($request->permissions != null) {
            $current_logged_in_admin_id = Auth::guard('admin')->id();
            $permissions = [] ;
            foreach ($request->permissions as $permission) {
                $permissions[] = new AdminPermission([
                    'permission_id' => $permission ,
                    'added_by' => $current_logged_in_admin_id,
                ]);
            }

            $admin->permissions()->saveMany($permissions);
        }



        return redirect(route('admins.index'))->with('success_msg'  , trans('admins.adding_success') );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        $admin->load(['permissions.permission'  , 'addedBy' ]);
        return view('board.admins.admin'  , compact('admin') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        $groups = PermissionGroup::with('permissions')->get(); 
        $types = AdminType::where('active' , 1)->get();
        $admin->load('permissions');
        $admin_permissions = $admin->permissions()->pluck('permission_id')->toArray();

        return view('board.admins.edit'  , compact('admin' , 'groups' , 'admin_permissions' , 'types') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminRequest $request,Admin $admin)
    {
        if (!$admin->edit($request->all())) 
            return back()->with('error_msg'  , trans('admins.adding_error') );


        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('admins', 's3');
            $admin->setImage(basename($path));
        }


        $admin->permissions()->delete();

        if ($request->permissions != null) {
            $current_logged_in_admin_id = Auth::guard('admin')->id();
            $permissions = [] ;
            foreach ($request->permissions as $permission) {
                $permissions[] = new AdminPermission([
                    'permission_id' => $permission ,
                    'added_by' => $current_logged_in_admin_id,
                ]);
            }

            $admin->permissions()->saveMany($permissions);
        }
        


        return back()->with('success_msg'  , trans('admins.updating_success') );

        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        if($admin->remove())
            return redirect(route('admins.index'))->with('success_msg' , trans('admins.deleted_success') );
    }


    public function change_status(Request $request)
    {
        $admin = Admin::find($request->admin_id);

        if ($admin) {
            $admin->active = $request->status;
            $admin->save();
        }

    }
}
