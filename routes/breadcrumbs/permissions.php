<?php

// Home > Permissions
Breadcrumbs::for('permissions.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Permissions', route('permissions.index'));
});

// Home > Permissions > Create
Breadcrumbs::for('permissions.create', function ($trail) {
    $trail->parent('permissions.index');
    $trail->push('New Permission', route('permissions.create'));
});

// Home > Permissions > Edit
Breadcrumbs::for('permissions.edit', function ($trail, $permission) {
    $trail->parent('permissions.index');
    $trail->push($permission->name, route('permissions.edit', $permission->id));
});

