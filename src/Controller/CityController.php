<?php
/**
 * Created by PhpStorm.
 * User: joaosantos
 * Date: 15/07/2018
 * Time: 02:21
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Cities;
use Symfony\Component\HttpFoundation\JsonResponse;

class CityController extends Controller
{
    private function getAllCities() {
        $repository = $this->getDoctrine()->getRepository(Cities::class);
        $cities = $repository->findAll();
        return $cities;
    }

    private function convertToJson($cities) {
        $json = array();

        foreach($cities as $city) {
            $cityJson = array('id' => $city->getId(), 'name' => $city->getName(), 'country_name' => $city->getCountryName());
            array_push($json, $cityJson);
        }

        return $json;
    }

    public function list() {
        $cities = $this->getAllCities();
        $json = $this->convertToJson($cities);

        $response = new JsonResponse($json);
        $response->setEncodingOptions($response->getEncodingOptions() | JSON_PRETTY_PRINT);

        return $response;
    }
}