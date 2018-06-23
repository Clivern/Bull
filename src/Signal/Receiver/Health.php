<?php

namespace App\Signal\Receiver;

use Psr\Log\LoggerInterface;

/**
 * Health Signal Receiver.
 */
class Health
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
