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
    /**
     * Returns HostelsRepository
     */
    private function getHostelsRepository() {
        return $this->getDoctrine()->getRepository(Hostels::class);
    }

    /**
     * Returns Hostel data as json
     * @param mixed $hostels list of Hostels objects and average_rating
     * @return array json formated
     */
    private function convertToJson($hostels)
    {
        $json = array();

        foreach ($hostels as $hostel) {
            $hostelJson = array('id' => $hostel[0]->getId(), 'name' => $hostel[0]->getName(), 'street' => $hostel[0]->getStreet(), 'city_name' => $hostel[0]->getCity()->getName(), 'average_rating' => $hostel['average_rating']);
            array_push($json, $hostelJson);
        }

        return $json;
    }

    /**
     * Endpoint to generate a JSON response with all the active hostels in a city.
     * @link /hostels/active/{$cityId}
     */
    public function listByCity($cityId)
    {
        $repository = $this->getHostelsRepository();
        $hostels = $repository->findHostelsByCity($cityId);
        $json = $this->convertToJson($hostels);

        $response = new JsonResponse($json);
        $response->setEncodingOptions($response->getEncodingOptions() | JSON_PRETTY_PRINT);

        return $response;
    }

    /**
     * Endpoint to generate a JSON response with all the active hostels in a city with a minimum rating of 4
     * @link /hostels/top/{$cityId}
     */
    public function listTop($cityId) {
        $repository = $this->getHostelsRepository();
        $hostels = $repository->findTopHostelsByCity($cityId, 4);
        $json = $this->convertToJson($hostels);

        $response = new JsonResponse($json);
        $response->setEncodingOptions($response->getEncodingOptions() | JSON_PRETTY_PRINT);

        return $response;
    }
}