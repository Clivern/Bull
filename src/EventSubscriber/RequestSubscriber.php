<?php

namespace App\EventSubscriber;

use App\Utils\Logger;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class RequestSubscriber implements EventSubscriberInterface
{
    private $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        $this->logger->openLog($event->getRequest()->get("_route"))->info(sprintf("App Request: %s", $event->getRequest()));
    }

    public static function getSubscribedEvents()
    {
        return [
           'kernel.request' => 'onKernelRequest',
        ];
    }
}
