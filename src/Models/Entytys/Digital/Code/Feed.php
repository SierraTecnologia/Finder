<?php

/**
 * This file is part of Gitonomy.
 *
 * (c) Alexandre Salomé <alexandre.salome@gmail.com>
 * (c) Julien DIDIER <genzo.wm@gmail.com>
 *
 * This source file is subject to the GPL license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Finder\Models\Entytys\Digital\Code;

use Doctrine\Common\Collections\ArrayCollection;

use Finder\Models\Model;

/**
 * @author Julien DIDIER <genzo.wm@gmail.com>
 */
class Feed
{
    protected $id;
    protected $project;
    protected $reference;
    protected $messages;

    public function __construct(Project $project, $reference = null)
    {
        $this->project   = $project;
        $this->reference = $reference;
    }

    public function getId()
    {
        return $id;
    }

    public function getProject()
    {
        return $this->project;
    }

    public function getReference()
    {
        return $this->reference;
    }

    public function getMessages()
    {
        return $this->messages;
    }
}
