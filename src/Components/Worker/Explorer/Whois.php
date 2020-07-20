<?php

namespace Finder\Components\Worker\Explorer;

use Fabrica\Models\Infra\Domain;
use Fabrica\Models\Infra\SubDomain;
use Fabrica\Models\Infra\DomainLink;

/**
 * Spider Class
 *
 * @class   Spider
 * @package crawler
 */
class Whois
{

    protected $domain = false;

    
    public function __construct($domain)
    {

        $this->domain = $domain;
    }

    public function execute()
    {
        
    }

}
