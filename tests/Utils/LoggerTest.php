<?php

/*
 * This file is part of the Bull project.
 * (c) Clivern <hello@clivern.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Tests\Utils;

use App\Tests\WebTest;
use Monolog\Logger as BaseLogger;

/**
 * Logger Service Test Cases.
 */
class LoggerTest extends WebTest
{
    /**
     * Test OpenLog Method.
     */
    public function testOpenLog()
    {
        $this->deleteAllLogs();
        $loggerService = $this->getContainer()->get('App\Utils\Logger');
        $loggerService->openLog('testOpenLog')->error('Hello');
        $this->assertTrue($this->logExists('testOpenLog.log'));
        $this->deleteAllLogs();
    }

    /**
     * Test Emergency Method.
     */
    public function testEmergency()
    {
        $this->deleteAllLogs();
        $loggerService = $this->getContainer()->get('App\Utils\Logger');
        $loggerService->openLog('testEmergency')->emergency('Hello');
        $this->assertContains('Hello', $this->getLogContent('testEmergency.log'));
        $this->deleteAllLogs();
    }

    /**
     * Test Alert Method.
     */
    public function testAlert()
    {
        $this->deleteAllLogs();
        $loggerService = $this->getContainer()->get('App\Utils\Logger');
        $loggerService->openLog('testAlert')->alert('Hello');
        $this->assertContains('Hello', $this->getLogContent('testAlert.log'));
        $this->deleteAllLogs();
    }

    /**
     * Test Critical Method.
     */
    public function testCritical()
    {
        $this->deleteAllLogs();
        $loggerService = $this->getContainer()->get('App\Utils\Logger');
        $loggerService->openLog('testCritical')->critical('Hello');
        $this->assertContains('Hello', $this->getLogContent('testCritical.log'));
        $this->deleteAllLogs();
    }

    /**
     * Test Warning Method.
     */
    public function testWarning()
    {
        $this->deleteAllLogs();
        $loggerService = $this->getContainer()->get('App\Utils\Logger');
        $loggerService->openLog('testWarning')->warning('Hello');
        $this->assertContains('Hello', $this->getLogContent('testWarning.log'));
        $this->deleteAllLogs();
    }

    /**
     * Test Error Method.
     */
    public function testError()
    {
        $this->deleteAllLogs();
        $loggerService = $this->getContainer()->get('App\Utils\Logger');
        $loggerService->openLog('testError')->error('Hello');
        $this->assertContains('Hello', $this->getLogContent('testError.log'));
        $this->deleteAllLogs();
    }

    /**
     * Test Notice Method.
     */
    public function testNotice()
    {
        $this->deleteAllLogs();
        $loggerService = $this->getContainer()->get('App\Utils\Logger');
        $loggerService->openLog('testNotice')->notice('Hello');
        $this->assertContains('Hello', $this->getLogContent('testNotice.log'));
        $this->deleteAllLogs();
    }

    /**
     * Test Info Method.
     */
    public function testInfo()
    {
        $this->deleteAllLogs();
        $loggerService = $this->getContainer()->get('App\Utils\Logger');
        $loggerService->openLog('testInfo')->info('Hello');
        $this->assertContains('Hello', $this->getLogContent('testInfo.log'));
        $this->deleteAllLogs();
    }

    /**
     * Test Debug Method.
     */
    public function testDebug()
    {
        $this->deleteAllLogs();
        $loggerService = $this->getContainer()->get('App\Utils\Logger');
        $loggerService->openLog('testDebug')->debug('Hello');
        $this->assertContains('Hello', $this->getLogContent('testDebug.log'));
        $this->deleteAllLogs();
    }

    /**
     * Test Log Method.
     */
    public function testLog()
    {
        $this->deleteAllLogs();
        $loggerService = $this->getContainer()->get('App\Utils\Logger');
        $loggerService->openLog('testLog')->log(BaseLogger::INFO, 'Hello');
        $this->assertContains('Hello', $this->getLogContent('testLog.log'));
        $this->deleteAllLogs();
    }

    private function getLogContent($logFile)
    {
        $logsPath = $this->getContainer()->get('kernel')->getLogDir();

        return (file_exists($logsPath.'/'.$logFile)) ? file_get_contents($logsPath.'/'.$logFile) : '';
    }

    private function logExists($logFile)
    {
        $logsPath = $this->getContainer()->get('kernel')->getLogDir();

        return file_exists($logsPath.'/'.$logFile);
    }

    private function deleteLog($logFile)
    {
        $logsPath = $this->getContainer()->get('kernel')->getLogDir();

        return @unlink($logsPath.'/'.$logFile);
    }

    private function deleteLogs($logFiles)
    {
        foreach ($logFiles as $logFile) {
            $this->deleteLog($logFile);
        }
    }

    private function deleteAllLogs()
    {
        $logsPath = $this->getContainer()->get('kernel')->getLogDir();
        $files = glob($logsPath.'/*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
    }
}
