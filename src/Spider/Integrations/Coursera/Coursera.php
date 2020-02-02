<?php

namespace Finder\Spider\Integrations\Coursera;

use Illuminate\Database\Eloquent\Model;
use Log;
use Cloudflare\API\Auth\APIKey;
use App\Models\User;
use Finder\Spider\Integrations\Integration;

class Coursera extends Integration
{
    public static $ID = 32;

    protected function getConnection($token = false)
    {
        return new Cloudflare\API\Adapter\Guzzle(new APIKey('user@example.com', 'apiKey'));
    }
}
