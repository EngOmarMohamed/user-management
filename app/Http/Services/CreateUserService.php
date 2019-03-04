<?php

namespace App\Http\Services;

use App\Http\Models\User;

class CreateUserService implements BaseService
{
    function make($params)
    {
        return User::create($params);
    }
}