<?php

namespace App\Http\Controllers\Admin;

use App\PermissionRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionRoleController extends Controller
{
    private $viewPath = 'admin.permission_role';

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roleId = $request['id'];
        $allPermissions = Permission::all();
        $prs = PermissionRole::where('role_id', $roleId)->get();
        $permissions = collect([]);

        foreach ($allPermissions as $permission) {
            $selected = '';

            foreach ($prs as $pr) {
                if ($pr['permission_id'] == $permission['id']) {
                    $selected = 'selected';
                }
            }

            $permissions->push(['id' => $permission['id'], 'name' => $permission['name'],'selected' => $selected]);
        }

        return view("{$this->viewPath}.index", compact('roleId', 'permissions'));
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
        if (!isset($request['role_id']) && !isset($request['role-select'])) {
            $request->session()->flash('msg-flash', [
                'type' => 'error',
                'text' => __('admin.error_create')
            ]);

            return Redirect::route("{$this->viewPath}s.index", ['id' => $request['role_id']]);
        }

        $role = Role::findById($request['role_id']);

        $pr = PermissionRole::where('role_id', $request['role_id']);

        $pr->delete();

        if (isset($request['role-select'])) {
            foreach ($request['role-select'] as $permission) {
                $role->givePermissionTo($permission);
            }
        }

        $request->session()->flash('msg-flash', [
            'type' => 'success',
            'text' => __('admin.success_create')
        ]);

        return Redirect::route("{$this->viewPath}s.index", ['id' => $request['role_id']]);
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
