<?php
namespace Finder\Pipelines\Track;

use Finder\Contracts\Spider\Track;

/**
 * Run all script analysers and outputs their result.
 */
class AccountTrack extends Track
{

    public function run()
    {
        // Caso Seja Instagram
        if ($this->model->integration_id == \Integrations\Connectors\Connector\Instagram\Instagram::getPrimary()) {
            $this->addInformateArray(\Integrations\Connectors\Connector\Instagram\Profile::getProfile($this->model->username));
        }
        return true;
    }


}