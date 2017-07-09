<?php

namespace Jaiwalker\BrontoApi;

use Jaiwalker\BrontoApi\Contact\ContactApi;

/**
 *
 * @Author JaiKora <kora.jayaram@gmail.com>
 * @GitHub -  https://github.com/jaiwalker
 */
class Api
{

    private $token;


    /**
     * Api constructor.
     *
     * @param $token
     */
    public function __construct($token)
    {
        $this->token = $token;
    }


    /**
     * Initiate Bronto Contact API Class
     *
     * @return ContactApi
     */
    public function contact()
    {
        return new ContactApi($this->token);
    }


}