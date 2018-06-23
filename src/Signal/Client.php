<?php

namespace App\Signal;

use Psr\Log\LoggerInterface;

/**
 * Signal Client.
 */
class Client
{
    private $logger;

    /**
     * Class Constructor.
     *
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
}
