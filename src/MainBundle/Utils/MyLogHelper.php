<?php

namespace MainBundle\Utils;

/**
 * This class should be used to log random message into a file.
 * 
 * @class MyLogHelper
 */
class MyLogHelper
{
    /**
     * Creates a log file if not exists and writes a message into it.
     * 
     * @param string $msg
     * @param string $name
     * @return boolean
     */
    public static function lg($msg = "", $name = null)
    {
        $filepath = '../var/logs/log-' . date('Y-m-d') . '.log';
        $dateFormat = 'Y-m-d H:i:s';
        $fopenMode = 'ab';

        if (!$fp = @fopen($filepath, $fopenMode)) {
            return false;
        }

        $msgOutput = '';

        if ($name) {
            $msgOutput .= $name.': ';
        }

        $msgOutput .= (is_array($msg) || is_object($msg))
            ? var_export($msg, true)
            : $msg;

        $message = date($dateFormat) . ' ---> ' . $msgOutput . PHP_EOL;

        flock($fp, LOCK_EX);
        fwrite($fp, $message);
        flock($fp, LOCK_UN);
        fclose($fp);

        return true;
    }
}
