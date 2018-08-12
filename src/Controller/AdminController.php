<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\User\UserInterface;

class AdminController extends Controller
{
    /**
     * @Route("/admin/uebersicht", name="admin")
     */
    public function index(UserInterface $user)
    {


        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'user' => $user
        ]);
    }
}
