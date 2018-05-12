<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\RoleStore;
use App\Http\Requests\Admin\RoleUpdate;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class RoleController extends Controller
{
    private $viewPath = 'admin.role';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("{$this->viewPath}.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("{$this->viewPath}.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RoleStore $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleStore $request)
    {
        Role::create($request->all());

        $request->session()->flash('msg-flash', [
            'type' => 'success',
            'text' => __('admin.success_create')
        ]);

        return redirect()->route('admin.roles.index');
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
        $role = Role::find($id);
        return view("{$this->viewPath}.edit", compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RoleUpdate $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleUpdate $request, $id)
    {
        $role = Role::find($id);
        $role->fill($request->all());
        $role->save();

        $request->session()->flash('msg-flash', [
            'type' => 'success',
            'text' => trans('admin.success_update')
        ]);

        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
    }

    public function table()
    {
        $roles = Role::select(['id', 'name', 'guard_name', 'created_at']);

        return Datatables::of($roles)
            ->addColumn('action', function ($role) {
                $permissions = '<a href="' . route("admin.permission_roles.index", ["id" => $role->id]) . '" 
                                class="btn btn-xs btn-warning">
                                    <i class="glyphicon glyphicon-lock"></i> '.trans_choice("admin.permissions", 10).'
                            </a>';

                $edit =   '<a href="' . route("admin.roles.edit", ["id" => $role->id]) . '" 
                                class="btn btn-xs btn-info">
                                    <i class="glyphicon glyphicon-pushpin"></i> '.trans("admin.edit").'
                            </a>';

                $delete =   '<a href="' . route("admin.users.destroy", ["id" => $role->id]) . '" 
                                class="btn btn-xs btn-danger remove-back">
                                    <i class="glyphicon glyphicon-pushpin"></i> '.trans("admin.delete").'
                            </a>';

                return "{$permissions} {$edit} {$delete}";
            })
            ->removeColumn('id')
            ->make(true);
    }
}
