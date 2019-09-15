<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

		 $perms = [
			 ['name' => 'create_roles',       'description' => '', 'guard_name' => 'web'],
			 ['name' => 'edit_roles',         'description' => '', 'guard_name' => 'web'],
			 ['name' => 'view_roles',         'description' => '', 'guard_name' => 'web'],
			 ['name' => 'delete_roles',       'description' => '', 'guard_name' => 'web'],
			 ['name' => 'create_permissions', 'description' => '', 'guard_name' => 'web'],
			 ['name' => 'edit_permissions',   'description' => '', 'guard_name' => 'web'],
			 ['name' => 'view_permissions',   'description' => '', 'guard_name' => 'web'],
			 ['name' => 'delete_permissions', 'description' => '', 'guard_name' => 'web'],
			 ['name' => 'create_users',       'description' => '', 'guard_name' => 'web'],
			 ['name' => 'edit_users',         'description' => '', 'guard_name' => 'web'],
			 ['name' => 'view_users',         'description' => '', 'guard_name' => 'web'],
			 ['name' => 'delete_users',       'description' => '', 'guard_name' => 'web'],
			 ['name' => 'create_roles',       'description' => '', 'guard_name' => 'web'],
			 ['name' => 'edit_roles',         'description' => '', 'guard_name' => 'web'],
			 ['name' => 'view_roles',         'description' => '', 'guard_name' => 'web'],
			 ['name' => 'delete_roles',       'description' => '', 'guard_name' => 'web']
		 ];

		 foreach ($perms as $perm) {
			 $permission              = new Permission();
			 $permission->name        = $perm['name'];
			 $permission->description = $perm['description'];
			 $permission->guard_name  = $perm['guard_name'];
			 $permission->save();
		 }

    }
}
