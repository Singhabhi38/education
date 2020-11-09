<?php
/**
 * Created by PhpStorm.
 * User: sadhikari
 * Date: 8/3/2016
 * Time: 7:17 PM
 */

namespace App\Log;

use Illuminate\Support\Facades\Log;
use \Exception;

class LogUtil implements  IProductLog{
    /*
     * Static Access
     */
    private static $loggers = [];

    public static function getLoggerInstance($className){
        $className = ((string)$className);

        if(isset(LogUtil::$loggers[$className])){
            return LogUtil::$loggers[$className];
        }

        $logger = new LogUtil($className);
        LogUtil::$loggers[$className] = $logger;
        return $logger;
    }

    /*
     * Real Logging Class
     */
    private $className = null;

    public function __construct($cName){
        $this->className = 'CLASS::'.$cName.' | ';
    }

    public function info($message = null){
        $msgStr = $this->className;
        $msgStr = $msgStr.$message;
        Log::info($msgStr);
    }

    public function error(Exception $exception, $message = null ){
        $msgStr = $this->className;
        $msgStr = $msgStr.$message;
        $msgStr = $msgStr.PHP_EOL;
        $msgStr = $msgStr.'Error Trace is below' . PHP_EOL;
        $msgStr = $msgStr . $exception->getMessage() . PHP_EOL;
        $msgStr = $msgStr.$exception->getTraceAsString();
        Log::error($msgStr);
    }

}