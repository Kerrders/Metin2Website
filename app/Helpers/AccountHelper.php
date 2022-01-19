<?php

namespace App\Helpers;

class AccountHelper
{
    /**
     * Generate password string
     * 
     * @param string $plain
     */
    public static function passwordHash(string $plain)
    {
        return hash('sha256', $plain);
    }
}
