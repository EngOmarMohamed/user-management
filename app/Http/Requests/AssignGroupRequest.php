<?php

namespace App\Http\Requests;

class AssignGroupRequest extends BaseRequest
{

    /**
     * Check if the user is authorized
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'group_id' => 'required|exists:groups,id'
        ];
    }

    public function all($keys = null): array
    {
        $data = parent::all($keys);
        $data['user_id'] = $this->route()[2]['user_id'];
        return $data;
    }
}
