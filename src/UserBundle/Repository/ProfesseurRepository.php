<?php

namespace UserBundle\Repository;

/**
 * ParentsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProfesseurRepository extends \Doctrine\ORM\EntityRepository
{
    public function prof()
    {
        $qb = $this->createQueryBuilder('p');
        $qb->select('count(p.id)');
        return $qb->getQuery()->getSingleScalarResult();
    }

}
