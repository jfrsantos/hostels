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
    public function findHostelsByCity($cityId) {
        return $this->createQueryBuilder('h')
            ->innerJoin('h.city', 'c')
            ->addSelect('c')
            ->andWhere('c.id = :id and h.active=TRUE')
            ->setParameter('id', $cityId)
            ->leftJoin('h.reviews', 'r')
            ->addSelect('AVG(r.rating) as average_rating')
            ->groupBy('h.id')
            ->getQuery()
            ->getResult();
    }

    public function findTopHostelsByCity($cityId, $rating) {
        return $this->createQueryBuilder('h')
            ->innerJoin('h.city', 'c')
            ->addSelect('c')
            ->andWhere('c.id = :id and h.active=TRUE')
            ->setParameter('id', $cityId)
            ->leftJoin('h.reviews', 'r')
            ->addSelect('AVG(r.rating) as average_rating')
            ->having('average_rating >= :rating')
            ->setParameter('rating', $rating)
            ->groupBy('h.id')
            ->getQuery()
            ->getResult();
    }
}