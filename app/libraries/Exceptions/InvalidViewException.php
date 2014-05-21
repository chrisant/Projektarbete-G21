<?php namespace G21\Libraries\Exceptions;

use Exception;

class InvalidViewException extends Exception {

    public function __construct($message = 'Kunde inte hitta vy-fil', $code = 0, Exception $previous = null)
    {
        parent::__construct();

    }

    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

}
