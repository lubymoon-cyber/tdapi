<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JavaController extends AbstractController
{
    /**
     * @Route("/api/users/list", name="liste", methods={"GET"})
     */
    public function liste(UsersRepository $usersRepo, NormalizerInterface $normalizer)

    {

    
        return $response = $this->json($usersRepo->findAll(), 200, [], ['groups' => 'post:read']);


    }
  

}

