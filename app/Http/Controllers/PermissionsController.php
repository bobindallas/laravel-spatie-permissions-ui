<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;

class PermissionsController extends Controller {

	public function __construct() {
		$this->middleware('auth'); // requires authentication
	}

	/**
	 * Display a listing of the resource.
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		$this->check_permission('view_permissions');
		$permissions = Permission::all();

		return view('permissions.index', compact('permissions'));

	}

	/**
	 * Show the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		$this->check_permission('create_permissions');

		return view('permissions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		$this->check_permission('create_permissions');

		$this->validate($request, [
		   'name'       => 'required|unique:permissions',
		   'guard_name' => 'required'
		]);
		
		$permission              = new Permission;
		$permission->name        = $request->input('name');
		$permission->description = $request->input('description');
		$permission->guard_name  = $request->input('guard_name');
		$permission->save();
		
		return redirect()->route('permissions.index')->with(['success', 'Permission Saved']);

	}

	/**
	 * Display the specified resource.
	 * @param  \App\Permission  $permission
	 * @return \Illuminate\Http\Response
	 */
	public function show(Permission $permission)
	{
	    //
	}

	/**
	 * Show the form for editing the specified resource.
	 * @param  \App\Permission  $permission
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Request $request, int $id) {

		$this->check_permission('edit_permissions');

		$permission = Permission::findOrFail($id);

		return view('permissions.edit', compact('permission'));

	}

	/**
	 * Update the specified resource in storage.
	 * @param  \App\Permission  $permission
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, int $id) {

		$this->check_permission('edit_permissions');

		$permission                = Permission::findOrFail($id);
		$permission->name          = $request->name;
		$permission->guard_name    = $request->guard_name;
		$permission->save();
		
		return redirect()->route('permissions.index')->with('success', 'Permission Updated');

	}

	/**
	 * Remove the specified resource from storage.
	 * @param  \App\Permission  $permission
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Permission $permission)
	{
	    //
	}

} // class
