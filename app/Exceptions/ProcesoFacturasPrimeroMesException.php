<?php

namespace App\Exceptions;

class ProcesoFacturasPrimeroMesException extends \Exception
{
    public function __construct()
    {
        parent::__construct('This command can only be executed on the first day of the month.');
    }
}
