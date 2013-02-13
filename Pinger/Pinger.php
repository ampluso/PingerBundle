<?php

/*
 * This file is part of PingerBundle.
 *
 * (c) Marcin Chyłek <marcin@chylek.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ampluso\PingerBundle\Pinger;

use Ampluso\PingerBundle\Pinger\Request\NativeRequest;
use Ampluso\PingerBundle\Pinger\Request\XMLRPCRequest;
use Ampluso\PingerBundle\Pinger\Response\Response;
use Ampluso\PingerBundle\Exception\PingerException;

class Pinger
{

    private $isXMLRPCExists = false;

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
        $serviceList = $this->getServices();

        foreach ($serviceList as $service) {
            $this->pingService($url, $service);
        }
    }

    public function pingService($url, $service)
    {
        $request = $this->getRequestFactory();
        $request->setUrl($url);
        $request->setService($service);

        return new Response($request->ping());
    }

    public function getServices()
    {
        
    }

    /**
     * Get client object
     * 
     * @return \Ampluso\PingerBundle\Request\Request\Request object
     */
    private function getRequestFactory()
    {
        if ($this->isXMLRPCExists) {
            return new XMLRPCRequest();
        } else {
            return new NativeRequest();
        }
    }

}
