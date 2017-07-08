<?php

namespace Cvs\Fabrication\Facades;

use Illuminate\Support\Facades\Facade;

class Fabrication extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'fabrication';
    }
}
