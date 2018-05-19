<?php

namespace App\Http\Controllers\Admin;

use App\RoleUser;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Role;

class RoleUserController extends Controller
{
    private $viewPath = 'admin.role_user';

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userId = $request['u'];
        $allRoles = Role::all();
        $rus = RoleUser::where('model_id', $userId)->where('model_type', 'App\User')->get();
        $roles = collect([]);

        foreach ($allRoles as $role) {
            $selected = '';

            foreach ($rus as $ru) {
                if ($ru['role_id'] == $role['id']) {
                    $selected = 'selected';
                }
            }

            $roles->push(['role_id' => $role['id'], 'role_name' => $role['name'], 'selected' => $selected]);
        }

        return view("{$this->viewPath}.index", compact('userId', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!isset($request['user_id']) && !isset($request['role-user-select'])) {
            $request->session()->flash('msg-flash', [
                'type' => 'error',
                'text' => __('admin.error_create')
            ]);

            return Redirect::route("{$this->viewPath}s.index", ['id' => $request['user_id']]);
        }

        $user = User::find($request['user_id']);

        $ru = RoleUser::where('model_id', $request['user_id'])->where('model_type', 'App\User');

        $ru->delete();

        if (isset($request['role-user-select'])) {
            foreach ($request['role-user-select'] as $role) {
                $user->assignRole($role);
            }
        }

        $request->session()->flash('msg-flash', [
            'type' => 'success',
            'text' => __('admin.success_create')
        ]);

        return Redirect::route("{$this->viewPath}s.index", ['u' => $request['user_id']]);
    }
}
