<?php

/**
 * This file is part of Fabrica.
 *
 * (c) Alexandre Salomé <alexandre.salome@gmail.com>
 * (c) Julien DIDIER <genzo.wm@gmail.com>
 *
 * This source file is subject to the GPL license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Finder\Models\Code\Message;

use Finder\Models\Code\Message;

use Integrations\Tools\Programs\Git\Log;

/**
 * @author Julien DIDIER <genzo.wm@gmail.com>
 */
class CommitMessage extends Message
{
    const DEFAULT_LIMIT = 3;

    protected $commitList;
    protected $commits;
    protected $commitCount;
    protected $revision;
    protected $isForce = false;

    public function fromLog(Log $log): void
    {
        $log->setLimit(self::DEFAULT_LIMIT);
        $commits = array();
        foreach ($log as $commit) {
            array_push(
                $commits, array(
                'hash'           => $commit->getHash(),
                'fixedShortHash' => $commit->getFixedShortHash(),
                'message'        => $commit->getMessage(),
                'shortMessage'   => $commit->getShortMessage(),
                'authorName'     => $commit->getAuthorName(),
                'authorEmail'    => $commit->getAuthorEmail(),
                )
            );
        }

        $this->setCommits($commits);
        $this->setCommitCount(count($log));

    }

    public function getCommits()
    {
        if (null === $this->commits) {
            $commits = stream_get_contents($this->commitList);

            $this->commits = json_decode($commits, true);
        }

        return $this->commits;
    }

    /**
     * @return static
     */
    public function setCommits(array $commits): self
    {
        $this->commitList = json_encode($commits);

        return $this;
    }

    public function getRevision()
    {
        return $this->revision;
    }

    public function setRevision(string $revision): void
    {
        $this->revision = $revision;
    }

    public function getCommitCount()
    {
        return $this->commitCount;
    }

    /**
     * @return static
     */
    public function setCommitCount(int $commitCount): self
    {
        $this->commitCount = $commitCount;

        return $this;
    }

    public function setForce(bool $force): void
    {
        $this->isForce = (bool) $force;
    }

    public function isForce()
    {
        return $this->isForce;
    }

    public function getName(): string
    {
        return 'commit';
    }
}
