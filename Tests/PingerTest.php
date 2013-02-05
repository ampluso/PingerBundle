<?php

/*
 * This file is part of PingerBundle.
 *
 * (c) Marcin Chyłek <marcin@chylek.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PingerBundle\Tests;

//use PingerBundle\Pinger;

class PingerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Pinger
     */
    protected $object;

    protected function setUp()
    {
        $this->object = new Pinger;
    }

    public function sendTest()
    {
        $this->assertTrue($this->object->send());
    }
}
