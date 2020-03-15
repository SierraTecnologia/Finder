<?php

namespace Finder\Spider\Integrations\Gitlab;

use Illuminate\Database\Eloquent\Model;
use Log;
use App\Models\User;
use Finder\Spider\Integrations\Integration;

class Gitlab extends Integration
{
    public static $ID = 4;
    protected function getConnection($token = false)
    {
        return \Gitlab\Client::create('http://git.yourdomain.com')
        ->authenticate('your_gitlab_token_here', \Gitlab\Client::AUTH_URL_TOKEN);

        // or for OAuth2 (see https://github.com/m4tthumphrey/php-gitlab-api/blob/master/lib/Gitlab/HttpClient/Plugin/Authentication.php#L47)
        return \Gitlab\Client::create('http://gitlab.yourdomain.com')
        ->authenticate('your_gitlab_token_here', \Gitlab\Client::AUTH_OAUTH_TOKEN);
    }
}