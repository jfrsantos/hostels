<?php
/**
 * Created by PhpStorm.
 * User: joaosantos
 * Date: 16/07/2018
 * Time: 23:17
 */

namespace App\Tests\Controller;


use App\Controller\HostelController;
use App\Entity\Cities;
use App\Entity\Hostels;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HostelControllerTest extends WebTestCase
{
    /**
     * test for convertToJson
     */
    public function testConvertToJson() {
        $hostel_controller = new HostelController();
        $hostels = array();
        $json = $hostel_controller->convertToJson($hostels);

        // expected empty json when no data is provided
        $this->assertEquals([], $json);

        // city from the hostel
        $city = new Cities();
        $city->setName('London');
        $city->setCountryName('England');

        $hostel = new Hostels();
        $hostel->setName('IBIS');
        $hostel->setActive(1);
        $hostel->setStreet('Big Ben');
        $hostel->setCity($city);

        $entry = [$hostel, 'average_rating' => 4.0];
        array_push($hostels, $entry);

        // second hostel
        $city = new Cities();
        $city->setName('Porto');
        $city->setCountryName('Portugal');

        $hostel = new Hostels();
        $hostel->setName('Glamour');
        $hostel->setActive(1);
        $hostel->setStreet('Av. Boavista');
        $hostel->setCity($city);

        $entry = [$hostel, 'average_rating' => 3.5];
        array_push($hostels, $entry);

        $json = $hostel_controller->convertToJson($hostels);

        // expected json to return. since the hostels aren't saved in the DB they do not have an id
        $expected = [
            ['id' => null,
                'name' => 'IBIS',
                'street' => 'Big Ben',
                'city_name' => 'London',
                'average_rating' => 4.0],
            ['id' => null,
                'name' => 'Glamour',
                'street' => 'Av. Boavista',
                'city_name' => 'Porto',
                'average_rating' => 3.5]
        ];

        $this->assertEquals($expected, $json);
    }

    /**
     * test the response of the active hostel list by city endpoint
     */
    public function testListByCity() {
        $client = static::createClient();

        $client->request('GET', '/hostels/active/4');
        $response = $client->getResponse();

        // expected json in response
        $expected_json = '[
            {"id": 9, "name": "Gravida Non Ltd", "street": "651-3030 Ut Rd.", "city_name": "Watford", "average_rating": "3.0"},
            {"id": 18, "name": "Magna Nam Foundation", "street": "Ap #880-5273 A, St.", "city_name": "Watford", "average_rating": null},
            {"id": 70, "name": "Sit Amet Consectetuer Corp.", "street": "4866 Luctus Av.", "city_name": "Watford", "average_rating": null},
            {"id": 95, "name": "Non Industries", "street": "652-9796 Quisque St.", "city_name": "Watford", "average_rating": null}
        ]';

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJsonStringEqualsJsonString($expected_json, $response->getContent());
    }

    /**
     * test the response of the active hostel list by city with an average rating equal to or greater than 4.0
     */
    public function testListTop() {
        $client = static::createClient();

        $client->request('GET', '/hostels/top/4');
        $response = $client->getResponse();

        // expected empty json as all hostels from the city have a rating inferior to 4.0
        $expected_json = '[]';

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJsonStringEqualsJsonString($expected_json, $response->getContent());

        $client->request('GET', '/hostels/top/7');
        $response = $client->getResponse();

        // expected json in response
        $expected_json = '[
            {
                "id": 10,
                "name": "Tincidunt Neque Limited",
                "street": "P.O. Box 565, 3547 Consectetuer Ave",
                "city_name": "Faro",
                "average_rating": "4.0"
            }
        ]';

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJsonStringEqualsJsonString($expected_json, $response->getContent());
    }
}