<?php

namespace Finder\Models\Code\Repository;

use Doctrine\ORM\EntityRepository;
use Finder\Models\Code\Project;
use Finder\Models\Code\User;
use Fabrica\Component\Pagination\Adapter\ArrayAdapter;
use Fabrica\Component\Pagination\Adapter\DoctrineOrmQueryAdapter;
use Fabrica\Component\Pagination\Pager;

class MessageRepository extends EntityRepository
{
    public function getPagerForProject(Project $project, $branch = null, $perPage = 50)
    {
        $qb = $this->createQueryBuilder('m')
            ->select('m, f')
            ->leftJoin('m.feed', 'f')
            ->where('f.project = :project')
            ->setParameter('project', $project)
            ->orderBy('m.id', 'DESC');

        if ($branch) {
            $qb
                ->andWhere('f.reference = :reference')
                ->setParameter('reference', 'refs/heads/'.$branch);
        }

        return new Pager(new DoctrineOrmQueryAdapter($qb->getQuery()), $perPage);
    }

    public function getPagerForUser(User $user, array $projects, $perPage = 50)
    {
        $ids = array_map(
            function ($project) {
                return $project->getId(); 
            }, $projects
        );

        if (0 === count($ids)) {
            return new Pager(new ArrayAdapter(array()), $perPage);
        }

        $qb = $this->createQueryBuilder('m')
            ->leftJoin('m.feed', 'f')
            ->where('m.user = :user')
            ->andWhere('f.project IN (:projects)')
            ->setParameter('user', $user)
            ->setParameter('projects', $ids)
            ->orderBy('m.publishedAt', 'DESC');

        return new Pager(new DoctrineOrmQueryAdapter($qb->getQuery()), $perPage);
    }
}
