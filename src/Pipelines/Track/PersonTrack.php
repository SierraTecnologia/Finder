<?php
namespace Finder\Pipelines\Track;

use Finder\Contracts\Spider\Track;


/**
 * Run all script analysers and outputs their result.
 */
class PersonTrack extends Track
{

    /**
     * @return string[]
     *
     * @psalm-return array{accounts: AccountTrack::class}
     */
    public function subTracks()
    {
        return [
            'accounts' => AccountTrack::class,
        ];
    }


    /**
     * @return (\Closure|string)[][]
     *
     * @psalm-return array{0: array{0: 'profilePic', 1: \Closure(mixed):void}}
     */
    public function collectInformateFromSubTracks(): array
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