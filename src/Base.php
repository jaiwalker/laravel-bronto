<?php

namespace Jaiwalker\BrontoApi;

use Bronto_Api;

/**
 *
 * @Author JaiKora <kora.jayaram@gmail.com>
 * @GitHub -  https://github.com/jaiwalker
 */
class Base
{

    /* @var $bronto \Bronto_Api */
    protected $bronto;


    /**
     * BrontoContactApi constructor.
     *
     * @param $token
     */
    public function __construct($token)
    {
        $this->initiateBrontoApi($token);
    }


    /**
     * Initiate Bronto API Class
     *
     * @param $token
     *
     * @return void
     */
    private function initiateBrontoApi($token)
    {
        $this->bronto = new Bronto_Api();
        if ( ! is_null($token)) {
            $this->bronto->setToken($token);
            $this->bronto->login();
        }

    }




}