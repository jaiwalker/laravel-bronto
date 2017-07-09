<?php

namespace Jaiwalker\BrontoApi\Facades;

use Illuminate\Support\Facades\Facade;

/**
 *
 * @Author JaiKora <kora.jayaram@gmail.com>
 * @GitHub -  https://github.com/jaiwalker
 */
class BrontoApi extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'BrontoApi';
    }
}