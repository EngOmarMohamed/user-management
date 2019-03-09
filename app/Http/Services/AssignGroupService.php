<?php

namespace App\Http\Services;

use App\Http\Models\Group;
use App\Http\Models\User;

class AssignGroupService implements BaseService
{

    function make($params): bool
    {
        $user = User::find($params['user_id']);

        if (!$user->groups->contains($params['group_id'])) {
            $group = Group::find($params['group_id']);
            $user->groups()->save($group);
            return true;
        }

        return false;
    }
}