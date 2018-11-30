<?php

namespace omegachien\SeoFriendlyUrl\Facades;

use Illuminate\Support\Facades\Facade;

class SeoFriendlyUrl extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'seofriendlyurl';
    }
}
