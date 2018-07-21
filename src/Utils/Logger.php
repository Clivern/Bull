<?php

/*
 * This file is part of the Bull project.
 * (c) Clivern <hello@clivern.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Utils;

use Monolog\Handler\StreamHandler;
use Monolog\Logger as BaseLogger;
use Psr\Log\LoggerInterface;

/**
 * Logger Class.
 *
 * @since 1.0.0
 */
class Logger implements LoggerInterface
{
    private $logger;
    private $path;
    private $level;
    private $levels = [
        'DEBUG' => BaseLogger::DEBUG,
        'INFO' => BaseLogger::INFO,
        'NOTICE' => BaseLogger::NOTICE,
        'WARNING' => BaseLogger::WARNING,
        'ERROR' => BaseLogger::ERROR,
        'CRITICAL' => BaseLogger::CRITICAL,
        'ALERT' => BaseLogger::ALERT,
        'EMERGENCY' => BaseLogger::EMERGENCY,
    ];

    /**
     * Class Constructor.
     *
     * @param BaseLogger $logger
     * @param string     $path
     * @param string     $level
     */
    public function __construct(BaseLogger $logger, $path, $level)
    {
        $this->logger = $logger;
        $this->path = $path;
        $this->level = mb_strtoupper($level);
    }

    /**
     * @param string $name
     *
     * @return LoggerInterface
     */
    public function openLog($name)
    {
        if (!empty($name) && $this->logger->getName() !== $name) {
            $this->logger = $this->createLogger($name);
        }

        return $this;
    }

    /**
     * @param string $name
     *
     * @return LoggerInterface
     */
    private function createLogger($name)
    {
        $this->level = (in_array($this->level, array_keys($this->levels), true)) ? $this->levels[$this->level] : BaseLogger::DEBUG;

        $file = str_replace('%name%', $name, $this->path);
        $handler = new StreamHandler($file, $this->level);

        return $this->logger->withName($name)->setHandlers([$handler]);
    }

    /**
     * {@inheritdoc}
     */
    public function emergency($message, array $context = [])
    {
        $this->logger->emergency($message, $context);
    }

    /**
     * {@inheritdoc}
     */
    public function alert($message, array $context = [])
    {
        $this->logger->alert($message, $context);
    }

    /**
     * {@inheritdoc}
     */
    public function critical($message, array $context = [])
    {
        $this->logger->critical($message, $context);
    }

    /**
     * {@inheritdoc}
     */
    public function error($message, array $context = [])
    {
        $this->logger->error($message, $context);
    }

    /**
     * {@inheritdoc}
     */
    public function warning($message, array $context = [])
    {
        $this->logger->warning($message, $context);
    }

    /**
     * {@inheritdoc}
     */
    public function notice($message, array $context = [])
    {
        $this->logger->notice($message, $context);
    }

    /**
     * {@inheritdoc}
     */
    public function info($message, array $context = [])
    {
        $this->logger->info($message, $context);
    }

    /**
     * {@inheritdoc}
     */
    public function debug($message, array $context = [])
    {
        $this->logger->debug($message, $context);
    }

    /**
     * {@inheritdoc}
     */
    public function log($level, $message, array $context = [])
    {
        $this->logger->log($level, $message, $context);
    }
}
