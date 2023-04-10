<?php

namespace App\Policies;

use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    public function create(Admin $user): bool
    {
        return true;
    }

    public function update(Admin $user): bool
    {
        return true;
    }

    public function delete(Admin $user, Admin $model): bool
    {
        return $model->id !== 1;
    }

    public function view(Admin $user): bool
    {
        return true;
    }
}
