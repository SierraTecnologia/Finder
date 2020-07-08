<?php

namespace Finder\Spider\Integrations\Zoho;

use Log;
// use Stalker\Models\Video;
use App\Models\User;
use Finder\Spider\Integrations\Integration;

class Zoho extends Integration
{
    public static $ID = 25;
    public static $URL = 'https://www.zoho.com/';

    public function getConnection($organizer = false)
    {
        return false;
    }
}
