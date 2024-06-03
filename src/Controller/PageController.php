<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Form\CommentType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\VarDumper\Cloner\AbstractCloner;

class PageController extends AbstractController
{
    #[Route('/', name : 'home')]
    public function home(EntityManagerInterface $entityManager, Request $request): Response
    {
     // $search = $request->get('search');
     // return new Response ('Welcome, symfony 7'. $request);
    $form = $this->createForm(CommentType::Class);
    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid()){
      $entityManager->persist($form->getData());
      $entityManager->flush();

      return $this->redirectToRoute('home');
    }

    $comments = $entityManager->getRepository(Comment::class)->findBy([], [ 'id' => 'DESC']);

    return $this->render('home.html.twig', [
      'comments' => $comments,
      'form' => $form->createView()
      ]);
    }
}