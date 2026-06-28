<?php

class EntityNotFoundException extends Exception
{
    public function __construct($message = "Élément introuvable.", $code = 0)
    {
        parent::__construct($message, $code);
    }
}