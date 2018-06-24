<?php

/*
 * This file is part of the Bull project.
 * (c) Clivern <hello@clivern.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Contract\Module\Service;

/**
 * API Response Interface.
 *
 * @since 1.0.0
 */
interface Response
{
    const HTTP_OK = 200;
    const HTTP_CREATED = 201;
    const HTTP_ACCEPTED = 202;
    const HTTP_NO_CONTENT = 204;
    const HTTP_BAD_REQUEST = 400;
    const HTTP_FORBIDDEN = 403;
    const HTTP_NOT_FOUND = 404;
    const HTTP_CONFLICT = 409;

    /**
     * Set Data.
     *
     * @param array $data
     */
    public function setData(array $data): self;

    /**
     * Get Data.
     *
     * @return array
     */
    public function getData(): array;

    /**
     * Set Error.
     *
     * @param array $error
     */
    public function setError(array $error): self;

    /**
     * Get Error.
     *
     * @return array
     */
    public function getError(): array;

    /**
     * Set Meta.
     *
     * @param array $meta
     */
    public function setMeta(array $meta): self;

    /**
     * Get Meta.
     *
     * @return array
     */
    public function getMeta(): array;

    /**
     * Set Response.
     *
     * @param array $response
     */
    public function setResponse(array $response): self;

    /**
     * Get Response.
     *
     * @return array
     */
    public function getResponse(): array;
}
