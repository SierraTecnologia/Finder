<?php

namespace Finder\Spider\Integrations\Google;

use Log;
// use Stalker\Models\Video;
use App\Models\User;
use Finder\Spider\Integrations\Integration;

class Google extends Integration
{
    public static $ID = 6;
    public static $URL = 'https://www.google.com/';

    public function getConnection($organizer = false)
    {
        return false;
    }
}
