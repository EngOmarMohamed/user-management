<?php

namespace App\Http\Services;

use App\Http\Models\Group;

class DeleteGroupService implements BaseService
{

    public function make($id): bool
    {
        // select * from `groups` where exists
        // (select * from `users` inner join `group_user` on `users`.`id` = `group_user`.`user_id` where `groups`.`id` = `group_user`.`group_id`)
        // and `id` = {{id}}
        $groupAssigend = Group::has('users')->where('id', '=', $id)->get()->toArray();

        if (empty($groupAssigend)) {
            return Group::destroy($id);
        }

        return false;
    }
}
