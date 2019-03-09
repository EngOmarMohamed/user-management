<?php

namespace App\Http\Services;

use App\Http\Models\User;

class DetachGroupService implements BaseService
{

    function make($params): bool
    {
        $user = User::find($params['user_id']);
        $detached = $user->groups()->detach($params['group_id']);
        if ($detached) {
            return true;
        }
        return false;
    }
}
