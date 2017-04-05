<?php

/** @noinspection PhpUnusedAliasInspection */
namespace Restaurant\RestaurantBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Restaurant\RestaurantBundle\Form\UtilisateursReservationType;
use Restaurant\RestaurantBundle\Entity\UtilisateursReservation;


class CmdController extends Controller {

    public function menuAction() {
        $session = $this->getRequest()->getSession();
        if (!$session->has('cmd'))
            $articles = 0;
        else
            $articles = count($session->get('cmd'   ));

        return $this->render('RestaurantBundle:Default:cmd/modulesUsed/cmd.html.twig', array('articles' => $articles));
    }

    public function supprimerAction($id) {
        $session = $this->getRequest()->getSession();
        $cmd = $session->get('cmd');

        if (array_key_exists($id, $cmd)) {
            unset($cmd[$id]);
            $session->set('cmd', $cmd);
            $this->get('session')->getFlashBag()->add('success', 'Article supprimé avec succès');
        }

        return $this->redirect($this->generateUrl('cmd'));
    }

    public function ajouterAction($id) {
        $session = $this->getRequest()->getSession();

        if (!$session->has('cmd')) {
            $session->set('cmd', array());
        }
        $cmd = $session->get('cmd');

        if (array_key_exists($id, $cmd)) {
            if ($this->getRequest()->query->get('qte') != null)
                $cmd[$id] = $this->getRequest()->query->get('qte');
            $this->get('session')->getFlashBag()->add('success', 'Quantité modifié avec succès');
        } else {
            if ($this->getRequest()->query->get('qte') != null)
                $cmd[$id] = $this->getRequest()->query->get('qte');
            else
                $cmd[$id] = 1;
            $this->get('session')->getFlashBag()->add('success', 'Article ajouté avec succès');
        }

        $session->set('cmd', $cmd);
        return $this->redirect($this->generateUrl('cmd'));
    }

    public function cmdAction() {

        $session = $this->getRequest()->getSession();
        if (!$session->has('cmd'))
            $session->set('cmd', array());

        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('RestaurantBundle:Produits')->findArray(array_keys($session->get('cmd')));


        return $this->render('RestaurantBundle:Default:cmd/layout/cmd.html.twig', array('produits' => $produits,
            'cmd' => $session->get('cmd')));
    }

    public function adresseSuppressionAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('RestaurantBundle:UtilisateursReservation')->find($id);

        if ($this->container->get('security.context')->getToken()->getUser() != $entity->getUtilisateur() || !$entity)
            return $this->redirect ($this->generateUrl ('reservationpage'));

        $em->remove($entity);
        $em->flush();

        return $this->redirect ($this->generateUrl ('reservationpage'));
    }

    public function reservationpageAction()
    {
        $utilisateur = $this->container->get('security.context')->getToken()->getUser();
        $entity = new UtilisateursReservation();
        $form = $this->createForm(new UtilisateursReservationType(), $entity);

        if ($this->get('request')->getMethod() == 'POST') {
            $form->handleRequest($this->getRequest());
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $entity->setUtilisateur($utilisateur);
                $em->persist($entity);
                $em->flush();

                return $this->redirect($this->generateUrl('reservationpage'));
            }
        }
        return $this->render('RestaurantBundle:Default:cmd/layout/reservationpage.html.twig', array('utilisateur' => $utilisateur,
            'form' => $form->createView()));
    }


    public function setReservationOnSession()
    {
        $session = $this->getRequest()->getSession();

        if (!$session->has('reservation')) $session->set('reservation',array());
        $reservation = $session->get('reservation');

        if ($this->getRequest()->request->get('reservationpage') != null )
        {
            $reservation['reservationpage'] = $this->getRequest()->request->get('reservationpage');
        } else {
            return $this->redirect($this->generateUrl('validation'));
        }
        $session->set('reservation',$reservation);
        return $this->redirect($this->generateUrl('validation'));
    }

    public function validationAction() {

        if ($this->get('request')->getMethod() == 'POST')
            $this->setReservationOnSession();

        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $reservation = $session->get('reservation');

        $produits = $em->getRepository('RestaurantBundle:Produits')->findArray(array_keys($session->get('cmd')));
        $reservationpage = $em->getRepository('RestaurantBundle:UtilisateursReservation')->find($reservation['reservationpage']);


        return $this->render('RestaurantBundle:Default:cmd/layout/validation.html.twig', array('produits' => $produits,
                                                                                               'reservationpage' => $reservationpage,
                                                                                          'cmd' => $session->get('cmd')));
    }
}
