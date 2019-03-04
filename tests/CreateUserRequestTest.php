<?php

use \App\Http\Requests\CreateUserRequest;
use \Illuminate\Support\Facades\Validator;

class CreateUserRequestTest extends TestCase
{
    /**
     * Test CreateUserRequest Validation on Error
     */
    public function testCreateUserValidationError()
    {
        $data = [
            'name' => 'Omar'
        ];
        $request = new CreateUserRequest();
        $rules = $request->rules();
        $validator = Validator::make($data, $rules);
        $result = $validator->fails();
        $this->assertTrue($result);
    }

    /**
     * Test CreateUserRequest Validation on Success
     */
    public function testCreateUserValidationSuccess()
    {
        $data = [
            'name' => 'Omar',
            'email' => 'Omar@domain.com'
        ];
        $request = new CreateUserRequest();
        $rules = $request->rules();
        $validator = Validator::make($data, $rules);
        $result = $validator->fails();
        $this->assertFalse($result);
    }
}
