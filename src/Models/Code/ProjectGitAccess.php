<?php

namespace Finder\Models\Code;

class ProjectGitAccess
{
    const WRITE_PERMISSION = 1;
    const ADMIN_PERMISSION = 2;

    protected $id;

    /**
     * @var Project
     */
    protected $project;

    /**
     * @var Role
     */
    protected $role;

    protected $reference;
    protected $isWrite;
    protected $isAdmin;

    public function __construct(Project $project, Role $role = null, $reference = '*', $isWrite = false, $isAdmin = false)
    {
        $this->project   = $project;
        $this->role      = $role;
        $this->reference = $reference;
        $this->isWrite   = $isWrite;
        $this->isAdmin   = $isAdmin;
    }

    /**
     * @param string $reference  Fully qualified reference name ("refs/heads/master")
     * @param int    $permission Write or Admin permission (see self::*_PERMISSION)
     *
     * @return bool
     */
    public function isGranted(User $user, $reference, $permission): bool
    {
        $userRole = $this->project->getUserRole($user);

        if (!$userRole || !$userRole->isRole($this->role)) {
            return false;
        }

        return $this->matches($reference) && $this->verifyPermission($permission);
    }

    public function matches(string $reference): bool
    {
        $pattern = preg_quote($this->reference);
        $pattern = str_replace('\*', '.*', $pattern);
        $pattern = '/^refs\/(heads|tags)\/'.$pattern.'$/';

        return 0 != preg_match($pattern, $reference);
    }

    public function verifyPermission(int $permission)
    {
        if ($permission === self::WRITE_PERMISSION) {
            return $this->isWrite || $this->isAdmin;
        } elseif ($permission === self::ADMIN_PERMISSION) {
            return $this->isAdmin;
        }
        throw new \InvalidArgumentException('Unknown permission '.$permission);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getProject(): Project
    {
        return $this->project;
    }

    public function getRole(): Role
    {
        return $this->role;
    }

    public function setRole(Role $role): void
    {
        $this->role = $role;
    }

    public function getReference()
    {
        return $this->reference;
    }

    public function setReference($reference): void
    {
        $this->reference = $reference;
    }

    public function isWrite()
    {
        return $this->isWrite;
    }

    public function setWrite($isWrite): void
    {
        $this->isWrite = $isWrite;
    }

    public function isAdmin()
    {
        return $this->isAdmin;
    }

    public function setAdmin($isAdmin): void
    {
        $this->isAdmin = $isAdmin;
    }
}
