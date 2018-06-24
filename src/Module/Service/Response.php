<?php

/*
 * This file is part of the Bull project.
 * (c) Clivern <hello@clivern.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Module\Service;

use App\Contract\Module\Service\Response as ResponseContract;

/**
 * API Response Service.
 *
 * @see http://jsonapi.org/ JsonAPI
 * @since 1.0.0
 */
class Response implements ResponseContract
{
    private $data = [];
    private $error = [];
    private $meta = [];
    private $response;

    /**
     * {@inheritdoc}
     */
    public function setData(array $data): ResponseContract
    {
        $this->data = $data;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * {@inheritdoc}
     */
    public function setError(array $error): ResponseContract
    {
        $this->error = $error;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getError(): array
    {
        return $this->error;
    }

    /**
     * {@inheritdoc}
     */
    public function setMeta(array $meta): ResponseContract
    {
        $this->meta = $meta;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getMeta(): array
    {
        return $this->meta;
    }

    /**
     * {@inheritdoc}
     */
    public function setResponse(array $response): ResponseContract
    {
        $this->response = $response;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getResponse(): array
    {
        if (!empty($this->error)) {
            return $this->error;
        }

        if (empty($this->response)) {
            $this->response = [
                'data' => $this->data,
                'meta' => $this->meta,
            ];
        }

        return $this->response;
    }
}
