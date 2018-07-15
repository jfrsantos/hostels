<?php
/**
 * Created by PhpStorm.
 * User: joaosantos
 * Date: 15/07/2018
 * Time: 12:19
 */

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class HostelsRepository extends EntityRepository
{
    public function findHostelsWithCity($cityId) {
        return $this->createQueryBuilder('h')
            ->innerJoin('h.city', 'c')
            ->addSelect('c')
            ->andWhere('c.id = :id')
            ->setParameter('id', $cityId)
            ->getQuery()
            ->getResult();
    }
}