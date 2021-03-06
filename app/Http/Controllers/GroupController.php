<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGroupRequest;
use App\Http\Requests\DeleteGroupRequest;
use App\Http\Services\CreateGroupService;
use App\Http\Services\DeleteGroupService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class GroupController extends Controller
{

    /**
     * Create new group
     *
     * @param CreateGroupRequest $request
     * @param CreateGroupService $createGroupService
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(CreateGroupRequest $request, CreateGroupService $createGroupService): JsonResponse
    {
        $params = $request->only('name');

        $created = $createGroupService->make($params);

        if ($created) {
            return \response()->json($created, Response::HTTP_CREATED);
        }
        return \response()->json(['message' => 'Error in create'], Response::HTTP_INTERNAL_SERVER_ERROR);

    }

    /**
     * Delete an existing user
     *
     * @param DeleteGroupRequest $request
     * @param DeleteGroupService $deleteGroupService
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(DeleteGroupRequest $request, DeleteGroupService $deleteGroupService): JsonResponse
    {
        $id = $request->only('id');

        $deleted = $deleteGroupService->make($id);

        if ($deleted) {
            return \response()->json(['message' => 'Deleted Successfully'], Response::HTTP_OK);
        }
        return \response()->json(['message' => 'Error in delete'], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
