<?php

namespace Restaurant\RestaurantBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

//use Restaurant\RestaurantBundle\Form\RechercheType;

class ProduitsController extends Controller {

    public function produitsAction() {
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('RestaurantBundle:Produits')->findAll();

        return $this->render('RestaurantBundle:Default:produits/layout/produits.html.twig', array('produits' => $produits));
    }

    public function presentationAction($id) {
        $session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('RestaurantBundle:Produits')->find($id);
        if (!$produit)
            throw $this->createNotFoundException('La page n\'existe pas.');
        if ($session->has('cmd'))
            $cmd = $session->get('cmd');
        else
            $cmd = false;
        return $this->render('RestaurantBundle:Default:produits/layout/presentation.html.twig', array('produit' => $produit, 'cmd' => $cmd));
    }
   
}
