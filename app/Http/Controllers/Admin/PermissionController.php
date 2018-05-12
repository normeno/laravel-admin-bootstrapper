<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PermissionStore;
use App\Http\Requests\Admin\PermissionUpdate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;

class PermissionController extends Controller
{
    private $viewPath = 'admin.permission';

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
        return view("{$this->viewPath}.create", compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PermissionStore $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionStore $request)
    {
        Permission::create($request->all());

        $request->session()->flash('msg-flash', [
            'type' => 'success',
            'text' => __('admin.success_create')
        ]);

        return redirect()->route("{$this->viewPath}s.index");
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
        $permission = Permission::find($id);
        return view("{$this->viewPath}s.edit", compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PermissionUpdate $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionUpdate $request, $id)
    {
        $permission = Permission::find($id);
        $permission->fill($request->all());
        $permission->save();

        $request->session()->flash('msg-flash', [
            'type' => 'success',
            'text' => trans('admin.success_update')
        ]);

        return redirect()->route("{$this->viewPath}s.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::find($id);
        $permission->delete();
    }

    public function table()
    {
        $permissions = Permission::select(['id', 'name', 'guard_name', 'created_at']);

        return Datatables::of($permissions)
            ->addColumn('action', function ($permission) {
                $edit =   '<a href="' . route("{$this->viewPath}s.edit", ["id" => $permission->id]) . '" 
                                class="btn btn-xs btn-info">
                                    <i class="glyphicon glyphicon-pushpin"></i> '.trans("admin.edit").'
                            </a>';

                $delete =   '<a href="' . route("{$this->viewPath}s.destroy", ["id" => $permission->id]) . '" 
                                class="btn btn-xs btn-danger remove-back">
                                    <i class="glyphicon glyphicon-pushpin"></i> '.trans("admin.delete").'
                            </a>';

                return "{$edit} {$delete}";
            })
            ->removeColumn('id')
            ->make(true);
    }
}
