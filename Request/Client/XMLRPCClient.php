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

use Ampluso\PingerBundle\Request\Client\Client;

class XMLRPCClient extends Client
{

    public function prepare()
    {
        return xmlrpc_encode_request("pingback.ping", array($this->url, $this->url));
    }

}
