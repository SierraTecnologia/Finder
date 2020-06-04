<?php
namespace Finder\Actions\Track;

use Finder\Actions\Contracts\Spider\Track;


/**
 * Run all script analysers and outputs their result.
 */
class PersonTrack extends Track
{

    public function subTracks()
    {
        return [
            'accounts' => AccountTrack::class,
        ];
    }


    public function collectInformateFromSubTracks()
    {
        return [
            [
                'profilePic',
                function ($result) {
                    $this->model->addMediaFromUrl($result)->toMediaCollection('avatars');
                }
            ]
        ];
       
    }


}