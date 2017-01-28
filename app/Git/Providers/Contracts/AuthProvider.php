<?php

namespace App\Git\Providers\Contracts;

interface AuthProvider
{
    public function redirect();

    public function user();
}
