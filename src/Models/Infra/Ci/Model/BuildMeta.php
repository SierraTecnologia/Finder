<?php

namespace Finder\Models\Infra\Ci\Model;

use Finder\Models\Infra\Ci\Base\BuildMeta as BaseBuildMeta;
use Integrations\Tools\Store\BuildStore;
use Integrations\Tools\Store\Factory;

class BuildMeta extends BaseBuildMeta
{
    /**
     * @return Build|null
     */
    public function getBuild()
    {
        $buildId = $this->getBuildId();
        if (empty($buildId)) {
            return null;
        }

        /**
 * @var BuildStore $buildStore 
*/
        $buildStore = Factory::getStore('Build');

        return $buildStore->getById($buildId);
    }
}
