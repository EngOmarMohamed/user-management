<?php

namespace App\Http\Requests;

class DeleteUserRequest extends BaseRequest
{
    /**
     * Check if the user is authorized
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id' => 'required|exists:users'
        ];
    }

    public function all($keys = null)
    {
        $data = parent::all($keys);
        $data['id'] = $this->route()[2]['id'];
        return $data;
    }

}
