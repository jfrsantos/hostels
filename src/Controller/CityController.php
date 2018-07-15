<?php
/**
 * Created by PhpStorm.
 * User: joaosantos
 * Date: 15/07/2018
 * Time: 02:21
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CityController extends Controller
{
    private function getAllCities() {}

    private function convertToJson($cities) {}

    public function list() {
        return $this->json(array("username" => "Johnny Bravo"));
    }
}