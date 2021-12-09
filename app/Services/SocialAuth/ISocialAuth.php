<?php

namespace App\Services\SocialAuth;

interface ISocialAuth
{
    public static function Authenticate($authDriverName);
}
