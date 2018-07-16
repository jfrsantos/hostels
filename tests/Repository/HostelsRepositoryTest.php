<?php
/**
 * Created by PhpStorm.
 * User: joaosantos
 * Date: 16/07/2018
 * Time: 21:15
 */

namespace App\Tests\Repository;


use App\Entity\Hostels;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class HostelsRepositoryTest extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    /**
     * {@inheritDoc}
     */
    protected function setUp()
    {
        self::bootKernel();
        $this->entityManager = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    /**
     * Test for findHostelsByCity
     */
    public function testFindHostelsByCity() {
        // find hostels in city with id=1
        $hostels = $this->entityManager
            ->getRepository(Hostels::class)
            ->findHostelsByCity(1);

        // query expected to return 3 entries
        $this->assertCount(3, $hostels);

        // expected first entry data
        $this->assertEquals(40, $hostels[0][0]->getId());
        $this->assertEquals('Quisque Libero Lacus Industries', $hostels[0][0]->getName());
        $this->assertEquals('P.O. Box 234, 7794 Parturient Avenue', $hostels[0][0]->getStreet());
        $this->assertEquals('London', $hostels[0][0]->getCity()->getName());
        $this->assertEquals(null, $hostels[0]['average_rating']);

        // find hostels in city with id=2
        $hostels = $this->entityManager
            ->getRepository(Hostels::class)
            ->findHostelsByCity(2);

        // query expected to return 10 entries
        $this->assertCount(10, $hostels);

        // find hostels in city with id=99
        $hostels = $this->entityManager
            ->getRepository(Hostels::class)
            ->findHostelsByCity(99);

        // no entries expected to return
        $this->assertCount(0, $hostels);
    }

    /**
     * Test for findTopHostelsByCity
     */
    public function testFindTopHostelsByCity() {
        // find hostels with minimum average rating of 3.0 in city with id=4
        $hostels = $this->entityManager
            ->getRepository(Hostels::class)
            ->findTopHostelsByCity(4, 3);

        // query expected to return 1 entry
        $this->assertCount(1, $hostels);

        // expected first entry data
        $this->assertEquals(9, $hostels[0][0]->getId());
        $this->assertEquals('Gravida Non Ltd', $hostels[0][0]->getName());
        $this->assertEquals('651-3030 Ut Rd.', $hostels[0][0]->getStreet());
        $this->assertEquals('Watford', $hostels[0][0]->getCity()->getName());
        $this->assertEquals(3.0, $hostels[0]['average_rating']);

        // find hostels with minimum average rating of 4.0 in city with id=4
        $hostels = $this->entityManager
            ->getRepository(Hostels::class)
            ->findTopHostelsByCity(4, 4);

        // no entries expected to return
        $this->assertCount(0, $hostels);
    }

    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();

        $this->entityManager->close();
        $this->entityManager = null; // avoid memory leaks
    }

}