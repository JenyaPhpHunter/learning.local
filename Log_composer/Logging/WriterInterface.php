<?php

namespace Learning\Logging;

interface WriterInterface
{
    public function write($message, array $context = array());
}