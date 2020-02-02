<?php
namespace Finder\Spider\Track;

use Finder\Spider\Abstracts\Track;

/**
 * Run all script analysers and outputs their result.
 */
class AccountTrack extends Track
{

    public function run()
    {
        // Caso Seja Instagram
        if ($this->model->integration_id == \Finder\Spider\Integrations\Instagram\Instagram::getPrimary()) {
            $this->addInformateArray(\Finder\Spider\Integrations\Instagram\Profile::getProfile($this->model->username));
        }
        return true;
    }


}