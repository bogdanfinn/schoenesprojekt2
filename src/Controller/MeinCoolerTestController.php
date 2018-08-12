<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MeinCoolerTestController extends Controller
{
    /**
     * @Route("/mein/cooler/test", name="mein_cooler_test")
     */
    public function indexZwei()
    {
        return $this->render('mein_cooler_test/index.html.twig', [
            'controller_name' => 'MeinCoolerTestController',
        ]);
    }

    /**
     * @Route("/mein/cooler/{id}", name="mein_cooler_test")
     */
    public function index()
    {
        return $this->render('mein_cooler_test/index.html.twig', [
            'controller_name' => 'MeinCoolerTestController',
        ]);
    }


}
