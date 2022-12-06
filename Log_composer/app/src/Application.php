<?php


class Application
{
    protected $logger;

    public function __construct($logger)
    {
        $this->logger = $logger;
    }
    public function format_and_write()
    {

        $write = $this->logger->write($this->logger->message, $this->logger->context);
        $this->logger->formatter($this->logger->format,$write);
    }
}