<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignGroupRequest;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\DeleteUserRequest;
use App\Http\Requests\DetachGroupRequest;
use App\Http\Services\AssignGroupService;
use App\Http\Services\CreateUserService;
use App\Http\Services\DeleteUserService;
use App\Http\Services\DetachGroupService;
use Illuminate\Http\Response;

class UserController extends Controller
{

    /**
     * Create new user
     *
     * @param CreateUserRequest $request
     * @param CreateUserService $createUserService
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(CreateUserRequest $request, CreateUserService $createUserService)
    {
        $params = $request->only('name', 'email');

        $created = $createUserService->make($params);

        if ($created) {
            return \response()->json($created, Response::HTTP_CREATED);
        }
        return \response()->json(['message' => 'Error in create'], Response::HTTP_INTERNAL_SERVER_ERROR);

    }

    /**
     * Delete an existing user
     *
     * @param DeleteUserRequest $request
     * @param DeleteUserService $deleteUserService
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(DeleteUserRequest $request, DeleteUserService $deleteUserService)
    {
        $id = $request->only('id');

        $deleted = $deleteUserService->make($id);

        if ($deleted) {
            return \response()->json(['message' => 'Deleted Successfully'], Response::HTTP_OK);
        }
        return \response()->json(['message' => 'Error in delete'], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Assign group to user
     *
     * @param AssignGroupRequest $request
     * @param AssignGroupService $assignGroupService
     * @return \Illuminate\Http\JsonResponse
     */
    public function assignGroup(AssignGroupRequest $request, AssignGroupService $assignGroupService)
    {
        $params = $request->only(['user_id', 'group_id']);
        $assigned = $assignGroupService->make($params);

        if ($assigned) {
            return \response()->json(['message' => 'Assigned Successfully'], Response::HTTP_CREATED);
        }
        return \response()->json(['message' => 'Already part of'], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Detach a group from user
     *
     * @param DetachGroupRequest $request
     * @param DetachGroupService $detachGroupService
     * @return \Illuminate\Http\JsonResponse
     */
    public function detachGroup(DetachGroupRequest $request, DetachGroupService $detachGroupService)
    {
        $params = $request->only(['user_id', 'group_id']);
        $assigned = $detachGroupService->make($params);

        if ($assigned) {
            return \response()->json(['message' => 'Detached Successfully'], Response::HTTP_CREATED);
        }
        return \response()->json(['message' => 'Not assigned'], Response::HTTP_INTERNAL_SERVER_ERROR);

    }
}
