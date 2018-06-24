<?php

namespace App\Signal;

use App\Utils\Logger;

/**
 * Signal Client.
 *
 * @since  1.0.0
 * @package App\Signal
 */
class Client
{
    private $logger;

    /**
     * Class Constructor.
     *
     * @param Logger $logger
     */
    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }
}
