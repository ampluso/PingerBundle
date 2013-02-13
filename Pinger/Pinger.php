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
        return array(
            'http://api.my.yahoo.com/RPC2',
            'http://rpc.blogrolling.com/pinger/',
            'http://blogsearch.google.com/ping/RPC2',
            'http://api.feedster.com/ping',
            'http://rpc.icerocket.com:10080',
            'http://www.bloglines.com/ping',
            'http://api.moreover.com/RPC2',
            'http://api.mw.net.tw/RPC2',
            'http://api.my.yahoo.com/ping',
            'http://bitacoras.net/ping/',
            'http://blogoole.com/ping/',
            'http://blogoon.net/ping',
            'http://blogpeople.net/ping',
            'http://blogping.unidatum.com/RPC2/',
            'http://blogsdominicanos.com/ping',
            'http://blogsearch.google.ae/ping/RPC2',
            'http://blogsearch.google.at/ping/RPC2',
            'http://blogsearch.google.be/ping/RPC2',
            'http://blogsearch.google.bg/ping/RPC2',
            'http://blogsearch.google.ca/ping/RPC2',
            'http://blogsearch.google.ch/ping/RPC2',
            'http://blogsearch.google.cl/ping/RPC2',
            'http://blogsearch.google.co.cr/ping/RPC2',
            'http://blogsearch.google.co.hu/ping/RPC2',
            'http://blogsearch.google.co.id/ping/RPC2',
            'http://blogsearch.google.co.il/ping/RPC2',
            'http://blogsearch.google.co.uk/ping/RPC2',
            'http://blogsearch.google.co.ve/ping/RPC2',
            'http://blogsearch.google.co.za/ping/RPC2',
            'http://blogsearch.google.com.ar/ping/RPC2',
            'http://blogsearch.google.com.au/ping/RPC2',
            'http://blogsearch.google.com.br/ping/RPC2',
            'http://blogsearch.google.com.co/ping/RPC2',
            'http://blogsearch.google.com.do/ping/RPC2',
            'http://blogsearch.google.com.mx/ping/RPC2',
            'http://blogsearch.google.com.my/ping/RPC2',
            'http://blogsearch.google.com.pe/ping/RPC2',
            'http://blogsearch.google.de/ping/RPC2',
            'http://blogsearch.google.es/ping/RPC2',
            'http://blogsearch.google.fr/ping/RPC2',
            'http://blogsearch.google.gr/ping/RPC2',
            'http://blogsearch.google.hr/ping/RPC2',
            'http://blogsearch.google.ie/ping/RPC2',
            'http://blogsearch.google.it/ping/RPC2',
            'http://blogsearch.google.lt/ping/RPC2',
            'http://blogsearch.google.pl/ping/RPC2',
            'http://blogsearch.google.pt/ping/RPC2',
            'http://blogsearch.google.ru/ping/RPC2',
            'http://blogsearch.google.sk/ping/RPC2',
            'http://blogsearch.google.us/ping/RPC2',
        );
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
