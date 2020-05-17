<?php

namespace Finder\Components\Worker\Explorer;

use Finder\Models\Digital\Infra\Domain;
use Finder\Models\Digital\Infra\SubDomain;
use Finder\Models\Digital\Infra\DomainLink;

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
