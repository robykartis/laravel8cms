<?php

namespace App\Http\Controllers;

use App\Models\Role as ModelsRole;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

use Spatie\Permission\Models\Role;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('roles.index', [
            'roles' => Role::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create', [
            'authorities' => config('permission.authorities')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => "required|string|max:50|unique:roles,name",
                'permissions' => "required"
            ],
            [],
            $this->attributes()
        );
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        // dd($request->all());

        DB::beginTransaction();
        try {
            $role = Role::create(['name' => $request->name]);
            $role->givePermissionTo($request->permissions);
            Alert::success(
                trans('roles.alert.create.title'),
                trans('roles.alert.create.message.success')
            );
            return redirect()->route('roles.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error(
                trans('roles.alert.create.title'),
                trans('roles.alert.create.message.error', ['error' => $th->getMessage()])
            );
            return redirect()->back()->withInput($request->all());
        } finally {
            DB::commit();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('roles.detail', [
            'role' => $role,
            'authorities' => config('permission.authorities'),
            'rolePermissions' => $role->permissions->pluck('name')->toArray()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
    private function attributes()
    {
        return [
            'name' => trans('roles.form_control.input.name.attribute'),
            'permissions' => trans('roles.form_control.input.permission.attribute'),
        ];
    }
}