<?php

class ValidationException extends Exception
{
    public function __construct($message = "Erreur de validation.", $code = 0)
    {
        parent::__construct($message, $code);
    }
}