<?php

namespace App\EventSubscriber;

use App\Utils\Logger;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

class ResponseSubscriber implements EventSubscriberInterface
{
    private $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function onKernelResponse(FilterResponseEvent $event)
    {
        $this->logger->openLog($event->getRequest()->get("_route"))->info(sprintf('App Response: %s', $event->getResponse()));
    }

    public static function getSubscribedEvents()
    {
        return [
           'kernel.response' => 'onKernelResponse',
        ];
    }
}
