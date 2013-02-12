<?php

/*
 * This file is part of PingerBundle.
 *
 * (c) Marcin Chyłek <marcin@chylek.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ampluso\PingerBundle\Request;

use Ampluso\PingerBundle\Request\PingerException;
use Ampluso\PingerBundle\Request\Client\NativeClient;
use Ampluso\PingerBundle\Request\Client\XMLRPCClient;

class Pinger
{

    private $isXMLRPCExists = true;

    /**
     * 
     * @throws Exception
     */
    public function __construct()
    {
        if (!function_exists('xmlrpc_server_create')) {
            $this->isXMLRPCExists = false;
        }

        if (!function_exists('curl_init')) {
            throw new PingerException('cURL not Installed');
        }
    }

    public function send()
    {
        
    }

}
