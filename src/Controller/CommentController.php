<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Form\CommentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CommentController extends AbstractController
{
    /**
     * @Route("/comment", name="comment")
     */
    public function index()
    {
        return $this->render('comment/index.html.twig', [
            'controller_name' => 'CommentController',
        ]);
    }

    /**
     * @Route("/comment/add", name="comment_add", methods={"GET", "POST"})
     */
    public function addComment(Request $request)
    {

        $newComment = new Comment();

        $form = $this->createForm(CommentType::class, $newComment);

        $form->handleRequest($request);

        if($form->isSubmitted()) {


            $manager = $this->getDoctrine()->getManager();
            $manager->persist($newComment);
            $manager->flush();
            return $this->redirectToRoute('comment_list');
        }

        return $this->render(
            'comment/add.html.twig',
            [
                "commentForm" => $form->createView()
            ]
        );
    }

    /**
     * @Route("comment/list", name="comment_list", methods={"GET"})
     */
    public function Commentlist()
    {
        $comments = $this->getDoctrine()->getRepository(Comment::class)->findAll();
        return $this->render('comment/list.html.twig', [
            'comments' => $comments,
        ]);
    }

}
