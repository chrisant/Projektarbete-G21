<?php namespace G21\Libraries\Exceptions;

use Exception;

class NotFoundException extends Exception {

    public function __construct($message = 'Sidan kunde inte hittas', $code = 0, Exception $previous = null)
    {
        parent::__construct();

    }

    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

}