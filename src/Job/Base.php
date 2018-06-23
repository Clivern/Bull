<?php

namespace App\Job;

use Psr\Log\LoggerInterface;

/**
 * Base Job.
 */
class Base
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
