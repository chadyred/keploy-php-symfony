<?php

namespace App\Authenticator;

use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\Security\Http\Event\LogoutEvent;

#[AsEventListener(LogoutEvent::class)]
class OnSuccessLogoutListener
{
    public function __invoke(LogoutEvent $event)
    {
        $response = $event->getResponse();
        $response->headers->clearCookie('X-Auth-Keploy');
        $event->setResponse($response);
    }
}
