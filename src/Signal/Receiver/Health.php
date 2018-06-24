<?php

namespace App\Signal\Receiver;

use App\Utils\Logger;

/**
 * Health Signal Receiver.
 *
 * @since  1.0.0
 * @package App\Signal\Receiver
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
