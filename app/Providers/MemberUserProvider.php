<?php

namespace App\Providers;

use App\Models\Member;
use Exception;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;

class MemberUserProvider implements UserProvider
{
    public function retrieveByToken ($identifier, $token) {
        throw new Exception('Method not implemented.');
    }

    public function updateRememberToken (Authenticatable $user, $token) {
        throw new Exception('Method not implemented.');
    }

    public function retrieveById ($identifier) {
        return Member::find($identifier);
    }

    public function retrieveByCredentials (array $credentials) {
        $phone = $credentials['phone'];

        return Member::where('phone', $phone)->first();
    }

    public function validateCredentials (Authenticatable $user, array $credentials) {
        $otp = $credentials['otp'];

        return $otp == '12345';
    }
}