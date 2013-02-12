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

use Ampluso\PingerBundle\Request\Client\NativeClient;
use Ampluso\PingerBundle\Request\Client\XMLRPCClient;
use Ampluso\PingerBundle\Request\PingerException;

class Pinger
{

    private $isXMLRPCExists = false;
    private $client = null;

    /**
     * 
     * @throws Exception
     */
    public function __construct()
    {
        if (function_exists('xmlrpc_server_create')) {
            $this->isXMLRPCExists = true;
        }

        if (!function_exists('curl_init')) {
            throw new PingerException('cURL not Installed');
        }
    }

    public function pingServices($url)
    {
        
    }

    public function pingService($url, $service)
    {
        $client = $this->getClientFactory();
        $client->setUrl($url);
        $client->setService($service);
        
        $client->ping();
    }

    public function getService()
    {
        
    }

    /**
     * Get client object
     * 
     * @return \Ampluso\PingerBundle\Request\Client\Client object
     */
    private function getClientFactory()
    {
        if ($this->isXMLRPCExists) {
            return new XMLRPCClient();
        } else {
            return new NativeClient();
        }
    }

}
