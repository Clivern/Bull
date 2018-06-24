<?php

namespace App\Signal\Sender;

use App\Utils\Logger;

/**
 * Health Signal Sender.
 *
 * @since  1.0.0
 * @package App\Signal\Sender
 */
class Health
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
