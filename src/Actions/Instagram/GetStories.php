<?php

namespace Finder\Actions\Instagram;

use Illuminate\Support\Facades\Facade;
use Telefonica\Models\Digital\Account;

class GetStories extends Instagram
{
    public function execute()
    {
        collect($this->executor->getStories())->each(
            function ($story) {
                dd($story);
            }
        );
    }
}
