<?php

namespace App\Module\Service;

use Psr\Log\LoggerInterface;
use App\Contract\Module\Service\MessageBroker;

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
     * @param string          $appIdent
     * @param string          $appRoles
     * @param string          $mqURL
     * @param LoggerInterface $logger
     */
    public function __construct(string $appIdent, string $appRoles, string $mqURL, LoggerInterface $logger)
    {
        $this->appIdent = $appIdent;
        $this->appRoles = $appRoles;
        $this->mqURL = $mqURL;
        $this->logger = $logger;
    }

    /**
     * Get App ident.
     *
     * @return string
     */
    public function getAppIdent(): string
    {
        return $this->appIdent;
    }

    /**
     * Get App Roles.
     *
     * @return string
     */
    public function getAppRoles(): array
    {
        return empty($this->appRoles) ? [] : explode(',', $this->appRoles);
    }

    /**
     * Get Message Broker Server Info.
     *
     * @return array
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
     * Configure Client.
     *
     * @return RabbitMQ
     */
    private function configClient(): self
    {
        return $this;
    }
}
