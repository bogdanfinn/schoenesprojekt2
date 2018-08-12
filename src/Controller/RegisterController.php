<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterController extends Controller
{
    /**
     * @Route("/register", name="register")
     */
    public function index(Request $request, EntityManagerInterface $entityManager, UserPasswordEncoderInterface $encoder, \Swift_Mailer $mailer)
    {

        if ($request->getMethod() === Request::METHOD_POST) {
            $username = $request->get('username');
            $password = $request->get('password');
            $email = $request->get('email');

            $existingUser = $entityManager->getRepository(User::class)->findBy(['username' => $username]);

            if ($existingUser) {
                throw new \Exception("Benutzername bereits vergeben");
            }

            $user = new User();
            $user->setUsername($username);
            $user->setEmail($email);
            $user->setPassword($encoder->encodePassword($user, $password));
            $user->setRoles(['ROLE_ADMIN']);

            $entityManager->persist($user);
            $entityManager->flush();
            $this->sendRegistrationConfirmationMail($mailer, $user);
        }

        return $this->render('register/index.html.twig', [
            'controller_name' => 'RegisterController',
        ]);
    }

    private function sendRegistrationConfirmationMail(\Swift_Mailer $mailer, User $user){

        $message = (new \Swift_Message('Registrierung'))
            ->setFrom("bogdan.finn@nordakademie.de")
            ->setTo($user->getEmail())
            ->setBody("Danke dass du dich registriert hast!");

        $mailer->send($message);
    }
}
