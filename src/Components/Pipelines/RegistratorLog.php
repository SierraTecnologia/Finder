<?php
namespace Finder\Components\Pipelines;

use Log;
use App\Models\User;
use SiWeapons\Integrations\Instagram\Instagram;
use SiWeapons\Integrations\Instagram\Facebook;


use Finder\Actions\PublishPost;
use Finder\Actions\SearchFollows;



use Finder\Routines\ForceNewRelations;
use Finder\Routines\GetNewData;
use Finder\Routines\SendNewData;

use SiObjects\Components\Comment;
use SiObjects\Components\Post;
use SiObjects\Components\Profile;
use SiObjects\Components\Relation;


class RegistratorLog
{
    public function register(Registrator $something)
    {
        echo 'registration log ' . $something . '<br>';
        return $something;
    }
}