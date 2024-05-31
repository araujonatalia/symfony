<?php

namespace App\Controller;

use App\Entity\Comment;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


use Symfony\Component\HttpFoundation\Response;
//use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\VarDumper\Cloner\AbstractCloner;

class PageController extends AbstractController
{
    #[Route('/')]
    public function home(EntityManagerInterface $entitymanager): Response
    {
     // $search = $request->get('search');
     // return new Response ('Welcome, symfony 7'. $request);

     $comments = $entitymanager->getRepository(Comment::class)->findBy([], [ 'id' => 'DESC']);

     return $this->render('home.html.twig', [
      'comments' => $comments]);
    }


}






