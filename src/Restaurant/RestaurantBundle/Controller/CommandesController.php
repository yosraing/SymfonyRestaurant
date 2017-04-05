<?php

namespace Restaurant\RestaurantBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Restaurant\RestaurantBundle\Entity\UtilisateursReservation;
use Restaurant\RestaurantBundle\Entity\Commandes;
use Restaurant\RestaurantBundle\Entity\Produits;

class CommandesController extends Controller {

    public function facture()
    {
        $em = $this->getDoctrine()->getManager();
        $generator = $this->container->get('security.secure_random');
        $session = $this->getRequest()->getSession();
        $reservation = $session->get('reservation');
        $cmd = $session->get('cmd');
        $commande = array();
        $totalHT = 0;
        $totalTVA = 0;

        $reservationpage = $em->getRepository('RestaurantBundle:UtilisateursReservation')->find($reservation['reservationpage']);
        $produits = $em->getRepository('RestaurantBundle:Produits')->findArray(array_keys($session->get('cmd')));

        foreach($produits as $produit)
        {
            $prixHT = ($produit->getPrix() * $cmd[$produit->getId()]);
            $prixTTC = ($produit->getPrix() * $cmd[$produit->getId()] / $produit->getTva()->getMultiplicate());
            $totalHT += $prixHT;

            if (!isset($commande['tva']['%'.$produit->getTva()->getValeur()]))
                $commande['tva']['%'.$produit->getTva()->getValeur()] = round($prixTTC - $prixHT,2);
            else
                $commande['tva']['%'.$produit->getTva()->getValeur()] += round($prixTTC - $prixHT,2);

            $totalTVA += round($prixTTC - $prixHT,2);

            $commande['produit'][$produit->getId()] = array('reference' => $produit->getNom(),
                'quantite' => $cmd[$produit->getId()],
                'prixHT' => round($produit->getPrix(),2),
                'prixTTC' => round($produit->getPrix() / $produit->getTva()->getMultiplicate(),2));
        }

        $commande['reservationpage'] = array('prenom' => $reservationpage->getPrenom(),
            'nom' => $reservationpage->getNom(),
            'tel' => $reservationpage->getTel(),
            'heurereservation' => $reservationpage->getHeurereservation,
            'niveau' => $reservationpage->getNiveau());

        $commande['prixHT'] = round($totalHT,2);
        $commande['prixTTC'] = round($totalHT + $totalTVA,2);
        $commande['token'] = bin2hex($generator->nextBytes(20));

        return $commande;
    }


    public function prepareCommandeAction()
    {
        $session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();

        if (!$session->has('commande'))
            $commande = new Commandes();
        else
            $commande = $em->getRepository('RestaurantBundle:Commandes')->find($session->get('commande'));

        $commande->setDate(new \DateTime());
        $commande->setUtilisateur($this->container->get('security.context')->getToken()->getUser());
        $commande->setValider(0);
        $commande->setReference(0);
        $commande->setCommande($this->facture());

        if (!$session->has('commande')) {
            $em->persist($commande);
            $session->set('commande',$commande);
        }
        var_dump($commande);
        die();
        $em->flush();

        return new Response($commande->getId());
    }

   }
