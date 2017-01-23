<?php

namespace QuidditchBundle\Repository;

/**
 * JoueurRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class JoueurRepository extends \Doctrine\ORM\EntityRepository
{
    public function findByExperienceTotaleAction()
    {
        $qb = $this->createQueryBuilder('j');
        {
            $qb->Where(array_sum(['j.experience']) / 7);

        }
    }

    public function findByFatigueMoyenneAction()
    {
        $qb = $this->createQueryBuilder('j');
        {
            $qb->Where(array_sum(['j.fatigue']) / 7);

        }
    }
    public function findByAgeMoyenAction()
    {
        $qb = $this->createQueryBuilder('j');
        {
            $qb->Where(array_sum(['j.experience']) / 7);

        }
    }
}
