<?php
/**
 * Created by PhpStorm.
 * User: joaosantos
 * Date: 15/07/2018
 * Time: 11:52
 */

namespace App\Controller;

use App\Entity\Hostels;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class HostelController extends Controller
{
    private function convertToJson($hostels)
    {
        $json = array();

        foreach ($hostels as $hostel) {
            $hostelJson = array('id' => $hostel->getId(), 'name' => $hostel->getName(), 'street' => $hostel->getStreet(), 'city_name' => $hostel->getCity()->getName());
            array_push($json, $hostelJson);
        }

        return $json;
    }

    public function listByCity($cityId)
    {
        $repository = $this->getDoctrine()->getRepository(Hostels::class);
        $hostels = $repository->findHostelsWithCity($cityId);

        $json = $this->convertToJson($hostels);

        $response = new JsonResponse($json);
        $response->setEncodingOptions($response->getEncodingOptions() | JSON_PRETTY_PRINT);

        return $response;
    }
}