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

    public function pingServices($title, $url)
    {
        $serviceList = $this->getServices();

        foreach ($serviceList as $service) {
            $this->pingService($service, $title, $url);
        }
    }

    public function pingService($service, $title, $url)
    {
        $request = $this->getRequestFactory();
        $request->setTitle($title);
        $request->setUrl($url);
        $request->setService($service);

        return new Response($request->ping());
    }

    public function getServices()
    {
        return array(
            'http://rpc.weblogs.com/RPC2',
            'http://blogsearch.google.com/ping/RPC2',
            'http://api.my.yahoo.co.jp/RPC2',
            'http://www.blogpeople.net/ping',
            'http://xping.pubsub.com/ping/',
            'http://ping.pubsub.com/ping',
            'http://rpc.aitellu.com',
            'http://rpc.reader.livedoor.com/ping',
            'http://rpc.odiogo.com/ping/',
            'http://rpc.twingly.com',
            'http://audiorpc.weblogs.com/RPC2',
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
