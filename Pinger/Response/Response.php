<?php

/*
 * This file is part of PingerBundle.
 *
 * (c) Marcin Chyłek <marcin@chylek.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ampluso\PingerBundle\Pinger\Response;

class Response
{

    private $responseString = '';

    public function __construct($response)
    {
        $this->responseString = $response;
        $this->parse();
    }

    public function getResponseString()
    {
        return $this->responseString;
    }

    public function __toString()
    {
        return $this->responseString;
    }

    private function parse()
    {
        
    }

}