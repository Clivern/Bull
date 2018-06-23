<?php

namespace App\Signal\Sender;

use Psr\Log\LoggerInterface;

/**
 * Health Signal Sender.
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
