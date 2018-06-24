<?php

namespace App\Utils;

use Monolog\Handler\StreamHandler;
use Monolog\Logger as BaseLogger;
use Psr\Log\LoggerInterface;

/**
 * Logger Class
 *
 * @since 1.0.0
 * @package App\Utils
 */
class Logger implements LoggerInterface
{
    private $logger;
    private $path;
    private $level;
    private $levels = [
        "DEBUG" => BaseLogger::DEBUG,
        "INFO" => BaseLogger::INFO,
        "NOTICE" => BaseLogger::NOTICE,
        "WARNING" => BaseLogger::WARNING,
        "ERROR" => BaseLogger::ERROR,
        "CRITICAL" => BaseLogger::CRITICAL,
        "ALERT" => BaseLogger::ALERT,
        "EMERGENCY" => BaseLogger::EMERGENCY
    ];

    /**
     * Class Constructor.
     *
     * @param BaseLogger $logger
     * @param string $path
     * @param string $level
     */
    public function __construct(BaseLogger $logger, $path, $level)
    {
        $this->logger = $logger;
        $this->path = $path;
        $this->level = strtoupper($level);
    }

    /**
     * @param string $name
     * @return LoggerInterface
     */
    public function openLog($name)
    {
        if (!empty($name) && $this->logger->getName() != $name) {
            $this->logger = $this->createLogger($name);
        }

        return $this;
    }

    /**
     * @param string $name
     * @return LoggerInterface
     */
    private function createLogger($name)
    {

        $this->level = (in_array($this->level, array_keys($this->levels))) ? $this->levels[$this->level] : BaseLogger::DEBUG;

        $file = str_replace('%name%', $name, $this->path);
        $handler = new StreamHandler($file, $this->level);

        return $this->logger->withName($name)->setHandlers([$handler]);
    }

    /**
     * {@inheritdoc}
     */
    public function emergency($message, array $context = array())
    {
        $this->logger->emergency($message, $context);
    }

    /**
     * {@inheritdoc}
     */
    public function alert($message, array $context = array())
    {
        $this->logger->alert($message, $context);
    }

    /**
     * {@inheritdoc}
     */
    public function critical($message, array $context = array())
    {
        $this->logger->critical($message, $context);
    }

    /**
     * {@inheritdoc}
     */
    public function error($message, array $context = array())
    {
        $this->logger->error($message, $context);
    }

    /**
     * {@inheritdoc}
     */
    public function warning($message, array $context = array())
    {
        $this->logger->warning($message, $context);
    }

    /**
     * {@inheritdoc}
     */
    public function notice($message, array $context = array())
    {
        $this->logger->notice($message, $context);
    }

    /**
     * {@inheritdoc}
     */
    public function info($message, array $context = array())
    {
        $this->logger->info($message, $context);
    }

    /**
     * @inheritDoc
     */
    public function debug($message, array $context = array())
    {
        $this->logger->debug($message, $context);
    }

    /**
     * {@inheritdoc}
     */
    public function log($level, $message, array $context = array())
    {
        $this->logger->log($message, $context);
    }
}
