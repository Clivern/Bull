<?php

namespace App\Contract\Module\Service;

/**
 * Message Broker Interface
 */
interface MessageBroker
{
    /**
     * Get App ident
     *
     * @return string
     */
    public function getAppIdent(): string;

    /**
     * Get App Roles
     *
     * @return string
     */
    public function getAppRoles(): array;

    /**
     * Get Message Broker Server Info
     *
     * @return array
     */
    public function getMqUrl(): array;
}
