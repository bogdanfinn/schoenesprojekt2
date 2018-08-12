<?php
/**
 * Created by PhpStorm.
 * User: bogdan
 * Date: 11.08.18
 * Time: 11:32
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class SeminarController extends Controller
{
    /**
     * @Route(path="/seminar", name="seminar_index")
     * @return string
     */
    public function indexAction()
    {
        $name = 'Bogdan';

        return $this->render('pages/index.html.twig', [
          'name' => $name
        ]);
    }

    /**
     * @Route(path="/seite-zwei", name="seminar_page_two")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function pageTwoAction(){
        $content = 'Seite Zwei';

        return $this->render('pages/page-two.html.twig', [
            'content' => $content,
        ]);
    }
}