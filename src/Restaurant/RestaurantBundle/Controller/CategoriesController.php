<?php

namespace Restaurant\RestaurantBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoriesController extends Controller {

    public function menuAction() {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('RestaurantBundle:Categories')->findAll();

        return $this->render('RestaurantBundle:Default:categories/modulesUsed/menu.html.twig', array('categories' => $categories));
    }

}
