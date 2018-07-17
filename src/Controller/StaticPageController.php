<?php
/**
 * Created by PhpStorm.
 * User: joaosantos
 * Date: 17/07/2018
 * Time: 20:11
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StaticPageController extends Controller
{
    public function index() {
        return $this->render('text/index.html.twig', array());
    }
}