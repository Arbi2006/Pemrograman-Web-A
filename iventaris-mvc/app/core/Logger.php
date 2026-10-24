<?php

class Logger
{
    public static function error(string $message): void
    {
        $logDir = ROOT_PATH . '/storage/logs';

        if (!is_dir($logDir)) {
            mkdir($logDir, 0775, true);
        }

        $logFile = $logDir . '/app.log';

        $entry = '[' . date('Y-m-d H:i:s') . '] ERROR: '
               . $message . PHP_EOL;

        error_log($entry, 3, $logFile);
    }
}
