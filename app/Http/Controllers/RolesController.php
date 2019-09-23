<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller {

   public function __construct() {
      $this->middleware('auth'); // requires authentication
   }

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		$this->check_permission('view_roles');

		$roles = Role::all();
		return view('roles.index', compact('roles'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		$this->check_permission('create_roles');

		$permissions = Permission::all();
		return view('roles.create', compact('permissions'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		$this->check_permission('create_roles');

		$this->validate($request, [
		   'name'       => 'required',
		   'guard_name' => 'required'
		]);
		
		$permissions      = $request->permissions;
		$role             = new Role;
		$role->name       = $request->input('name');
		$role->guard_name = $request->input('guard_name');
		$role->save();
		
		$permissions = $request->get('permissions', []);
		$role->syncPermissions($permissions);

		return redirect()->route('roles.index')->with('success', 'Role Saved');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Role  $role
	 * @return \Illuminate\Http\Response
	 */
	public function show(Role $role)
	{
	    //
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Role  $role
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Request $request, $id) {

		$this->check_permission('edit_roles');

		$role        = Role::findOrFail($id);
		$permissions = Permission::all();

		return view('roles.edit', compact('role', 'permissions'));

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Role  $role
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {

		$this->check_permission('edit_roles');

		$role             = Role::findOrFail($id);
		$role->name       = $request->name;
		$role->guard_name = $request->guard_name;
		$role->save();

		$permissions = $request->get('permissions', []);
		$role->syncPermissions($permissions);

		return redirect()->route('roles.index')->with('success', 'Role Updated');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Role  $role
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Role $role)
	{
	    //
	}
}
