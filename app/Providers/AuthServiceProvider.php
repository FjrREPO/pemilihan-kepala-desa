<?php

use Illuminate\Support\Facades\Gate;

public function boot()
{
    $this->registerPolicies();

    Gate::define('isAdmin', function ($user) {
        return $user->role === 'admin';
    });

    Gate::define('isPemilih', function ($user) {
        return $user->role === 'pemilih';
    });
}
