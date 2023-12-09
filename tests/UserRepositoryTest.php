<?php

use PHPUnit\Framework\TestCase;
use App\Repositories\UserRepository;
use App\Models\User;

class UserRepositoryTest extends TestCase
{
    public function testCreateOrUpdate()
    {
        $userRepository = new UserRepository();

        // Sample user details
        $userDetails = [
            'name' => 'Dawer Sohail',
            'email' => 'dawar.sohail016@gmail.com',
            'password' => bcrypt('secret'),
        ];

        $createdOrUpdatedUser = $userRepository->createOrUpdate($userDetails);
        $this->assertInstanceOf(User::class, $createdOrUpdatedUser);
        $this->assertEquals($userDetails['name'], $createdOrUpdatedUser->name);
        $this->assertEquals($userDetails['email'], $createdOrUpdatedUser->email);
    }
}
