<?php

namespace Finder\Spider\Integrations\Gmail;

use Log;
// use Stalker\Models\Video;
use App\Models\User;
use Finder\Spider\Integrations\Integration;

class Gmail extends Integration
{
    public static $ID = 5;
    public static $URL = 'https://www.gmail.com/';

    public function getConnection($organizer = false)
    {
        return false;
    }
}
