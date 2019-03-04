<?php

namespace App\Http\Services;

use App\Http\Models\Group;

class CreateGroupService implements BaseService
{
    function make($params)
    {
        return Group::create($params);
    }
}