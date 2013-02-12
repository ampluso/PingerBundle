<?php

/*
 * This file is part of PingerBundle.
 *
 * (c) Marcin Chyłek <marcin@chylek.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ampluso\PingerBundle\Request\Client;

abstract class Client
{

    protected $url = null;
    protected $serviceUrl = null;

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function setService($serviceUrl)
    {
        $this->serviceUrl = $serviceUrl;
    }

    public function send()
    {
        $this->prepare();
    }

    public function prepare();
}
