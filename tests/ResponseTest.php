<?php

/*
 * This file is part of the Bull project.
 * (c) Clivern <hello@clivern.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Tests;

use App\Contract\Module\Service\Response as ResponseContract;
use PHPUnit\Framework\TestCase;

class ResponseTest extends TestCase
{
    public function testResponseContract()
    {
        $this->assertSame(ResponseContract::HTTP_OK, 200);
        $this->assertSame(ResponseContract::HTTP_CREATED, 201);
        $this->assertSame(ResponseContract::HTTP_ACCEPTED, 202);
        $this->assertSame(ResponseContract::HTTP_NO_CONTENT, 204);
        $this->assertSame(ResponseContract::HTTP_BAD_REQUEST, 400);
        $this->assertSame(ResponseContract::HTTP_FORBIDDEN, 403);
        $this->assertSame(ResponseContract::HTTP_NOT_FOUND, 404);
        $this->assertSame(ResponseContract::HTTP_CONFLICT, 409);
    }
}
