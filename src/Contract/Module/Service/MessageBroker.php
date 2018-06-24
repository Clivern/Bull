<?php

/*
 * This file is part of the Bull project.
 * (c) Clivern <hello@clivern.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Contract\Module\Service;

/**
 * Message Broker Interface.
 *
 * @since 1.0.0
 */
interface MessageBroker
{
    /**
     * Get App ident.
     *
     * @return string
     */
    public function getAppIdent(): string;

    /**
     * Get App Roles.
     *
     * @return string
     */
    public function getAppRoles(): array;

    /**
     * Get Message Broker Server Info.
     *
     * @return array
     */
    public function getMqUrl(): array;
}
