<?php

namespace ApiSports\NbaAPI\Facades;

use Illuminate\Support\Facades\Facade;

class NbaAPI extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'nba-api';
    }

}