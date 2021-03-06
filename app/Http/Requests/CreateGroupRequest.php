<?php

namespace App\Http\Requests;


class CreateGroupRequest extends BaseRequest
{
    /**
     * Check if the user is authorized
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Rules to be applied to attributes
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
        ];
    }

}