<?php 

namespace Finder\Helps;

use Illuminate\Database\Capsule\Manager as Capsule;

class DebugHelper
{
    public static function debug($message)
    {
        self::printMessage('[Debug] '.$message);
    }

    public static function info($message)
    {
        self::printMessage('[Info] '.$message);
    }

    public static function printMessage($message)
    {
        echo $message."\n";
    }
}