<?php

namespace Restaurant\RestaurantBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Restaurant\RestaurantBundle\Form\RechercheType;


class RestaursController extends Controller {

    public function categorieAction($categorie) {
        $em = $this->getDoctrine()->getManager();
        $restaurs = $em->getRepository('RestaurantBundle:Restaurs')->byCategorie($categorie);

        $categorie = $em->getRepository('RestaurantBundle:Categories')->find($categorie);
        if (!$categorie)
            throw $this->createNotFoundException('La page n\'existe pas.');

        return $this->render('RestaurantBundle:Default:restaurs/layout/restaurs.html.twig', array('restaurs' => $restaurs));
    }

    public function restaursAction() {
        $em = $this->getDoctrine()->getManager();
        $restaurs = $em->getRepository('RestaurantBundle:Restaurs')->findAll();

        return $this->render('RestaurantBundle:Default:restaurs/layout/restaurs.html.twig', array('restaurs' => $restaurs));
    }

    public function presentationRSTAction($id) {
        $em = $this->getDoctrine()->getManager();
        $restaur = $em->getRepository('RestaurantBundle:Restaurs')->find($id);
        if (!$restaur)
            throw $this->createNotFoundException('La page n\'existe pas.');
        return $this->render('RestaurantBundle:Default:restaurs/layout/presentationRST.html.twig', array('restaur' => $restaur));
    }

    public function rechercheAction() {
        $form = $this->createForm(new RechercheType());
        return $this->render('RestaurantBundle:Default:Recherche/modulesUsed/recherche.html.twig', array('form' => $form->createView()));
    }

    public function rechercheTraitementAction() {
        $form = $this->createForm(new RechercheType());

        if ($this->get('request')->getMethod() == 'POST') {
            $form->bind($this->get('request'));
            $em = $this->getDoctrine()->getManager();
            $restaurs = $em->getRepository('RestaurantBundle:Restaurs')->recherche($form['recherche']->getData());
        } else {
            throw $this->createNotFoundException('La page n\'existe pas.');
        }

        return $this->render('RestaurantBundle:Default:restaurs/layout/restaurs.html.twig', array('restaurs' => $restaurs));
    }

    public function listeProduitsAction($restaur) {
        $session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('RestaurantBundle:Produits')->byRestaur($restaur);
        if ($session->has('cmd'))
            $cmd = $session->get('cmd');
        else
            $cmd = false;
        return $this->render('RestaurantBundle:Default:restaurs/layout/listeProduits.html.twig', array('produits' => $produits,
            'cmd' => $cmd));
    }

}
