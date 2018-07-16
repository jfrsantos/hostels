<?php
/**
 * Created by PhpStorm.
 * User: joaosantos
 * Date: 15/07/2018
 * Time: 15:50
 */

namespace App\Tests\Controller;

use App\Entity\Cities;
use App\Controller\CityController;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CityControllerTest extends WebTestCase
{
    /**
     * test for convertToJson
     */
    public function testConvertToJson() {
        $city_controller = new CityController();
        $cities = array();
        $json = $city_controller->convertToJson($cities);

        // expected empty json when no data is provided
        $this->assertEquals([], $json);

        $city = new Cities();
        $city->setName('Manchester');
        $city->setCountryName('England');

        array_push($cities, $city);

        $city = new Cities();
        $city->setName('Lisboa');
        $city->setCountryName('Portugal');

        array_push($cities, $city);

        $json = $city_controller->convertToJson($cities);

        // expected json to return. since the cities aren't saved in the DB they do not have an id
        $expected = [
            ['id' => null,
                'name' => 'Manchester',
                'country_name' => 'England'],
            ['id' => null,
                'name' => 'Lisboa',
                'country_name' => 'Portugal']
        ];

        $this->assertEquals($expected, $json);
    }

    /**
     * test the response of the get all cities endpoint
     */
    public function testList() {
        $client = static::createClient();

        $client->request('GET', '/cities');
        $response = $client->getResponse();

        // expected json in response
        $expected_json = '[
            {"id": 1, "name": "London", "country_name": "England"},
            {"id": 2, "name": "Manchester", "country_name": "England"},
            {"id": 3, "name": "Kesington", "country_name": "England"},
            {"id": 4, "name": "Watford", "country_name": "England"},
            {"id": 5, "name": "Porto", "country_name": "Portugal"},
            {"id": 6, "name": "Lisboa", "country_name": "Portugal"},
            {"id": 7, "name": "Faro", "country_name": "Portugal"},
            {"id": 8, "name": "Braga", "country_name": "Portugal"},
            {"id": 9, "name": "Guarda", "country_name": "Portugal"}
        ]';

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJsonStringEqualsJsonString($expected_json, $response->getContent());
    }
}