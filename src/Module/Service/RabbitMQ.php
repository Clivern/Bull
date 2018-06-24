<?php

/*
 * This file is part of the Bull project.
 * (c) Clivern <hello@clivern.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Module\Service;

use App\Contract\Module\Service\MessageBroker;
use App\Utils\Logger;

/**
 * RabbitMQ Service.
 */
class RabbitMQ implements MessageBroker
{
    private $client;
    private $appIdent;
    private $appRoles;
    private $mqURL;
    private $logger;

    /**
     * Class Constructor.
     *
     * @param string $appIdent
     * @param string $appRoles
     * @param string $mqURL
     * @param Logger $logger
     */
    public function __construct(string $appIdent, string $appRoles, string $mqURL, Logger $logger)
    {
        $this->appIdent = $appIdent;
        $this->appRoles = $appRoles;
        $this->mqURL = $mqURL;
        $this->logger = $logger;
    }

    /**
     * {@inheritdoc}
     */
    public function getAppIdent(): string
    {
        return $this->appIdent;
    }

    /**
     * {@inheritdoc}
     */
    public function getAppRoles(): array
    {
        return empty($this->appRoles) ? [] : explode(',', $this->appRoles);
    }

    /**
     * {@inheritdoc}
     */
    public function getMqUrl(): array
    {
        $mqURL = explode('@', $this->mqURL);
        $mqURL[0] = explode(':', $mqURL[0]);

        return [
            'url' => $mqURL[1],
            'username' => $mqURL[0][0],
            'password' => $mqURL[0][1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    private function configClient(): self
    {
        return $this;
    }
}
