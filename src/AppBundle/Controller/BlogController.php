<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Post;
use AppBundle\Form\PostType;

class BlogController extends Controller
{
    /**
     * @Route("/", name="home_index", defaults={"page"=1})
     * @Route("/page/{page}", name="home_index_paginated", requirements={"page": "\d+"})
     */
    public function indexAction($page)
    {
        $query = $this->getDoctrine()->getRepository('AppBundle:Post')->findAll();

        $paginator = $this->get('knp_paginator');
        $posts = $paginator->paginate($query, $page, Post::NUM_ITEMS);
        $posts->setUsedRoute('home_index_paginated');

        return $this->render('home/index.html.twig', array('posts' => $posts));
    }

    /**
     * @Route("/admin/new", name="admin_index")
     */
    public function newAction(Request $request)
    {
        $post = new Post();
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $user = $this->get('security.token_storage')->getToken()->getUser();
            $post->setAuthor($user->getUsername());
            $post->setPublishedAt(new \DateTime());
            $slug = $post->generateSlugValue($post->getSluggableFields());
            $post->setSlug($slug);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($post);
            $entityManager->flush();

            $request->getSession()->getFlashBag()->add('success', 'Post Created!');
        }

        return $this->render('admin/index.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/posts/{id}", name="home_post")
     */
    public function showPostAction(Post $post)
    {
        return $this->render('home/show.html.twig',
            array('post' => $post));
    }
}
