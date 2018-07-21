<?php

/*
 * This file is part of the Bull project.
 * (c) Clivern <hello@clivern.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Tests;

use Symfony\Component\Console\Tester\CommandTester;

abstract class CommandTest extends CommandTester
{
    public function getContainer()
    {
        self::bootKernel();
        $container = self::$kernel->getContainer();

        return self::$container;
    }
}
