<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

require __DIR__.'/breadcrumbs/users.php';
require __DIR__.'/breadcrumbs/roles.php';
require __DIR__.'/breadcrumbs/permissions.php';
