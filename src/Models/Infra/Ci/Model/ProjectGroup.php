<?php

namespace Finder\Models\Infra\Ci\Model;

use Integrations\Tools\Store\Factory;
use Finder\Models\Infra\Ci\Base\ProjectGroup as BaseProjectGroup;
use Integrations\Tools\Store\ProjectStore;

class ProjectGroup extends BaseProjectGroup
{
    /**
     * @return Project[]
     */
    public function getGroupProjects()
    {
        /**
 * @var ProjectStore $projectStore 
*/
        $projectStore = Factory::getStore('Project');

        return $projectStore->getByGroupId($this->getId(), false);
    }
}
