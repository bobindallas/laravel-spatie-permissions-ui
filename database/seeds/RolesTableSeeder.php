<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class RolesTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 * @return void
	 */
	public function run() {

		$roles = [
			['name' => 'Superuser', 'guard_name' => 'web'],
			['name' => 'Admin',     'guard_name' => 'web'],
			['name' => 'User',      'guard_name' => 'web']
		];

		 foreach ($roles as $r) {
			 $role             = new Role();
			 $role->name       = $r['name'];
			 $role->guard_name = $r['guard_name'];
			 $role->save();

			// attach all permissions to Superuser
			if ($role->name == 'Superuser') {
		 		$role->syncPermissions(Permission::all());

			// view permissions for everyone else by default
			} else {
				$role->syncPermissions(Permission::where('name', 'LIKE', 'view_%')->get());

			}
		}
	}
}
