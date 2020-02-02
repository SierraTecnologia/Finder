<?php
namespace Finder\Components\Pipelines;

use Log;
use App\Models\User;
use Finder\Spider\Integrations\Instagram\Instagram;
use Finder\Spider\Integrations\Instagram\Facebook;


use Finder\Actions\PublishPost;
use Finder\Actions\SearchFollows;



use Finder\Routines\ForceNewRelations;
use Finder\Routines\GetNewData;
use Finder\Routines\SendNewData;

use SiObjects\Components\Comment;
use SiObjects\Components\Post;
use SiObjects\Components\Profile;
use SiObjects\Components\Relation;

use App\Pipelines\Contracts\Registrator;
use App\Pipelines\Contracts\Notificator;

class NotificationEmail
{
    public function notification(Notificator $something)
    {
        echo 'notification ' . $something . '<br>';
        return $something;
    }
}