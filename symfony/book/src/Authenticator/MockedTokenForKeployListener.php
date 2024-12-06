<?php

namespace App\Authenticator;

use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

// NOT SECURE AT ALL IT IS TO POC THE STATELESS INSTEAD OF USING A MOCKSESS ID
#[AsEventListener('kernel.response')]
class MockedTokenForKeployListener
{
    public function __construct(private readonly Security $security)
    {
    }

    public function __invoke(ResponseEvent $event): void
    {
        if ($this->security->isGranted('IS_AUTHENTICATED_FULLY')) {
            $response = $event->getResponse();
            $response->headers->setCookie(cookie: new Cookie(
                name: 'X-Auth-Keploy',
                value: $this->security->getUser()->getUserIdentifier(),
                expire: (new \DateTime())->modify("+1 day"),
                path: "/",
                domain: "localhost",
                secure: $event->getRequest()->getScheme() === 'https',      
                httpOnly: false,
                raw: true,
                sameSite: 'lax'
            ));

            $event->setResponse($response);
        }
    }
}
