<?php

use \App\Http\Services\CreateUserService;

class CreateUserServiceTest extends TestCase
{
    /**
     * Test Create User
     */
    public function testCreateUser()
    {
        $service = new CreateUserService();
        $data = [
            'name' => 'Omar',
            'email' => 'Omar@domain.com',
        ];
        $result = $service->make($data);
        $this->assertNotEmpty($result);
        $this->assertEquals($data['name'], $result['name']);
    }
}
