<?php

namespace App\Http\Services;

use App\Http\Models\User;

class DeleteUserService implements BaseService
{

    function make($id)
    {
        return User::destroy($id);
    }
}