<?php

// Home > Roles
Breadcrumbs::for('roles.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Roles', route('roles.index'));
});

// Home > Roles > Create
Breadcrumbs::for('roles.create', function ($trail) {
    $trail->parent('roles.index');
    $trail->push('New Role', route('roles.create'));
});

// Home > Roles > Edit
Breadcrumbs::for('roles.edit', function ($trail, $role) {
    $trail->parent('roles.index');
    $trail->push($role->name, route('roles.edit', $role->id));
});

