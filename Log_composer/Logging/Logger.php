<?php

namespace Learning\Logging;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/WriterInterface.php';
require_once __DIR__ . '/FormatterInterface.php';


use Psr\Log\AbstractLogger;
use Psr\Log\LogLevel;

class Logger extends AbstractLogger implements WriterInterface,FormatterInterface
{
    protected string $filename;
    public string $message;
    public array $context;
    public string $format;

    public function __construct(string $filename, string $message, $context, string $format)
    {
        $this->filename = $filename;
        $this->message = $message;
        $this->context = $context;
        $this->format = $format;
    }

    public function emergency($message, array $context = array())
    {
        $this->log(LogLevel::EMERGENCY, $message, $context);
    }

    /**
     * Action must be taken immediately.
     *
     * Example: Entire website down, database unavailable, etc. This should
     * trigger the SMS alerts and wake you up.
     *
     * @param string  $message
     * @param mixed[] $context
     *
     * @return void
     */
    public function alert($message, array $context = array())
    {
        $this->log(LogLevel::ALERT, $message, $context);
    }

    /**
     * Critical conditions.
     *
     * Example: Application component unavailable, unexpected exception.
     *
     * @param string  $message
     * @param mixed[] $context
     *
     * @return void
     */
    public function critical($message, array $context = array())
    {
        $this->log(LogLevel::CRITICAL, $message, $context);
    }

    /**
     * Runtime errors that do not require immediate action but should typically
     * be logged and monitored.
     *
     * @param string  $message
     * @param mixed[] $context
     *
     * @return void
     */
    public function error($message, array $context = array())
    {
        $this->log(LogLevel::ERROR, $message, $context);
    }

    /**
     * Exceptional occurrences that are not errors.
     *
     * Example: Use of deprecated APIs, poor use of an API, undesirable things
     * that are not necessarily wrong.
     *
     * @param string  $message
     * @param mixed[] $context
     *
     * @return void
     */
    public function warning($message, array $context = array())
    {
        $this->log(LogLevel::WARNING, $message, $context);
    }

    /**
     * Normal but significant events.
     *
     * @param string  $message
     * @param mixed[] $context
     *
     * @return void
     */
    public function notice($message, array $context = array())
    {
        $this->log(LogLevel::NOTICE, $message, $context);
    }

    /**
     * Interesting events.
     *
     * Example: User logs in, SQL logs.
     *
     * @param string  $message
     * @param mixed[] $context
     *
     * @return void
     */
    public function info($message, array $context = array())
    {
        $this->log(LogLevel::INFO, $message, $context);
    }

    /**
     * Detailed debug information.
     *
     * @param string  $message
     * @param mixed[] $context
     *
     * @return void
     */
    public function debug($message, array $context = array())
    {
        $this->log(LogLevel::DEBUG, $message, $context);
    }

    public function log($level, $message, array $context = array())
    {
        $words="";
        foreach($context as $word){
            $words .= $word. " ";
        }
        $result_log = ['level' => $level,'message' => $message,'words' => $words];
        return $result_log;
    }
    public function write($message, array $context = array())
    {
        $data = $this->log($level = NULL, $message, $context);
        file_put_contents(
            $this->filename,
            date('d-m-Y H:i:s'). ' ' . $data['level']. ' ' . $data['message']. ' ' . $data['words'] . PHP_EOL,
            FILE_APPEND
        );
        $data['date'] = date('d-m-Y H:i:s');
        return $data;
    }
    public function formatter($format,$data)
    {
    $exploded = str_replace(explode(" ", $format), $data, $format);

    }
}