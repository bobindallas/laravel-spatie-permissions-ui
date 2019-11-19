<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersController extends Controller {

   public function __construct() {
      $this->middleware('auth'); // requires authentication
   }

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		$users = User::all();
		return view('users.index', compact('users'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

		$permissions = Permission::all();
		$roles       = Role::all();

		return view('users.create', compact('permissions', 'roles'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		$this->validate($request, [
			'name'     => 'bail|required|min:2',
			'email'    => 'required|email|unique:users',
			'password' => 'required|min:6'
		]);
		
		$user           = new User;
		$user->name     = $request->input('name');
		$user->email    = $request->input('email');
		$user->password = bcrypt($request->input('password'));
		$user->save();
		
		// Handle the user roles
		$this->syncPermissions($request, $user);

		return redirect()->route('users.index')->with(['success', 'User Saved']);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function show(User $user)
	{
	    //
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Request $request, int $id) {

		$user             = User::findOrFail($id);
		$permissions      = Permission::all();
		$roles            = Role::all();
		$user_roles       = $user->getRoleNames();
		$user_permissions = $user->getDirectPermissions();

		return view('users.edit', compact(
			'user',
			'roles',
			'permissions',
			'user_roles',
			'user_permissions'
		));

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, int $id) {

		$user = User::findOrFail($id);

		$user->name  = $request->name;
		$user->email = $request->email;

		// Handle the user roles
		$this->syncPermissions($request, $user);

		if ($request->get('password')) {
			$user->password = bcrypt($request->get('password'));
		}

		$user->save();
		
		return redirect()->route('users.index')->with('success', 'User Updated');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(int $id) {

		$this->check_permission('delete_users');

		if (auth()->user()->id == $id) { 
			return redirect()->route('users.index')->with('success', 'Current user cannot be deleted');

		}
		
		if (User::findOrFail($id)->delete()) { 
			return redirect()->route('users.index')->with('success', 'User Deleted');

		}
	}

	 private function syncPermissions(Request $request, $user) {	

		// submitted roles / permissions
		$roles       = $request->get('roles', []);
		$permissions = $request->get('permissions', []);

		// Get the roles
		$roles = Role::find($roles);

		// check for current role changes
		if(! $user->hasAllRoles($roles)) { 

			// reset all direct permissions for user
			// Bob - I have a potential problem with this - but we'll leave it for now
			$user->permissions()->sync([]);

		} else {
			// handle permissions
			$user->syncPermissions($permissions);

		}	

		$user->syncRoles($roles);

		return $user;
	}
}
