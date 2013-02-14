<?php

/*
 * This file is part of PingerBundle.
 *
 * (c) Marcin Chyłek <marcin@chylek.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ampluso\PingerBundle\Pinger\Request;

use Ampluso\PingerBundle\Pinger\Request\Request;

class XMLRPCRequest extends Request
{

    public function prepare()
    {
        return xmlrpc_encode_request("weblogUpdates.ping", array($this->title, $this->url));
    }

}
