<?php

namespace Restaurant\RestaurantBundle\Listener;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class RedirectionListener {

    public function __construct(ContainerInterface $container, Session $session) {
        $this->session = $session;
        $this->router = $container->get('router');
        $this->securityContext = $container->get('security.context');
    }

    public function onKernelRequest(GetResponseEvent $event) {
        $route = $event->getRequest()->attributes->get('_route');

        if ($route == 'reservationpage' || $route == 'validation') {
            if ($this->session->has('cmd')) {
                if (count($this->session->get('cmd')) == 0)
                    $event->setResponse(new RedirectResponse($this->router->generate('cmd')));
            }

            if (!is_object($this->securityContext->getToken()->getUser())) {
                $this->session->getFlashBag()->add('notification', 'Vous devez vous identifier');
                $event->setResponse(new RedirectResponse($this->router->generate('fos_user_security_login')));
            }
        }
    }

}
