<?php

namespace App\Services;

class UserService
{
    public function getUsers()
    {
        return [
            [
                'id' => 1,
                'name' => 'Sashi'
            ],
            [
                'id' => 2,
                'name' => 'Vardhan'
            ]
        ];
    }
}