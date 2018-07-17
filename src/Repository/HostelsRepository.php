<?php
/**
 * Created by PhpStorm.
 * User: joaosantos
 * Date: 15/07/2018
 * Time: 12:19
 */

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Repository for Hostel queries
 */
class HostelsRepository extends EntityRepository
{

    /**
     * Returns all the active hostels in a city
     * @param int $cityId id of the city
     * @return mixed query result with Hostels objects and average_rating
     */
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

    /**
     * Returns all the active hostels in a city with a minimum average rating
     * @param int $cityId id of the city
     * @param int $rating mininum rating required for a hostel to be listed
     * @return mixed query result with Hostels objects and average_rating
     */
    public function findTopHostelsByCity($cityId, $rating) {
        return $this->createQueryBuilder('h')
            ->innerJoin('h.city', 'c')
            ->addSelect('c')
            ->andWhere('c.id = :id and h.active=TRUE')
            ->setParameter('id', $cityId)
            ->innerJoin('h.reviews', 'r')
            ->addSelect('AVG(r.rating) as average_rating')
            ->having('average_rating >= :rating')
            ->setParameter('rating', $rating)
            ->groupBy('h.id')
            ->getQuery()
            ->getResult();
    }
}