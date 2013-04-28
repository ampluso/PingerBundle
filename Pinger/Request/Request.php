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

use Ampluso\PingerBundle\Pinger\Request\RequestInterface;

abstract class Request implements RequestInterface
{

    protected $title = null;
    protected $url = null;
    protected $serviceUrl = null;

    /**
     * Set site title
     * 
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Set site url
     * 
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Set service address url
     * 
     * @param string $serviceUrl
     */
    public function setService($serviceUrl)
    {
        $this->serviceUrl = $serviceUrl;
    }

    /**
     * Ping service
     * 
     * @return string
     */
    public function ping()
    {
        return $this->send($this->prepare());
    }

    /**
     *  XML-RPC Request
     * 
     * @param string $request
     * @return string
     */
    private function send($request)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->serviceUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
        curl_setopt($ch, CURLOPT_USERAGENT, 'PingerBundle (http://github.com/ampluso/PingerBundle)');
        curl_setopt($ch, CURLOPT_TIMEOUT, 25);

        $result = curl_exec($ch);
        curl_close($ch);

        return html_entity_decode($result);
    }

}
