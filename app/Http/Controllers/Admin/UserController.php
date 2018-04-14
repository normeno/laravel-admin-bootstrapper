<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\UserStore;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    private $viewPath = 'admin.user';

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
     * @param UserStore $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStore $request)
    {
        User::create($request->all());

        $request->session()->flash('msg-flash', [
            'type' => 'success',
            'text' => __('admin.success_create')
        ]);

        return redirect()->route('admin.user.index');
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
        $user = User::find($id);
        return view("{$this->viewPath}.edit", compact('user'));
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
        $user = User::find($id);
        $user->delete();
    }

    public function table()
    {
        $users = User::select(['id', 'avatar', 'name', 'username', 'email', 'created_at']);

        return Datatables::of($users)
            ->addColumn('action', function ($user) {
                $edit =   '<a href="' . route("admin.users.edit", ["id" => $user->id]) . '" 
                                class="btn btn-xs btn-info">
                                    <i class="glyphicon glyphicon-pushpin"></i> '.trans("admin.edit").'
                            </a>';

                $delete =   '<a href="' . route("admin.users.destroy", ["id" => $user->id]) . '" 
                                class="btn btn-xs btn-danger remove-back">
                                    <i class="glyphicon glyphicon-pushpin"></i> '.trans("admin.delete").'
                            </a>';

                return "{$edit} {$delete}";
            })
            ->removeColumn('id')
            ->make(true);
    }
}
