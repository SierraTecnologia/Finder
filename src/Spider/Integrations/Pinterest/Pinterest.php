<?php

namespace Finder\Spider\Integrations\Pinterest;

use Log;
// use Stalker\Models\Video;
use App\Models\User;
use Finder\Spider\Integrations\Integration;

class Pinterest extends Integration
{
    public static $ID = 13;
    public static $URL = 'https://www.pinterest.es/pin/';

    public function getConnection($organizer = false)
    {
        return false;
    }
}
