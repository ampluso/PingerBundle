<?php

/*
 * This file is part of PingerBundle.
 *
 * (c) Marcin Chyłek <marcin@chylek.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ampluso\PingerBundle\Tests\Request;

use Ampluso\PingerBundle\Request\Pinger;

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

    protected function tearDown()
    {
        
    }

    /**
     * @covers PingerBundle\Request\Pinger::send
     */
    public function testSend()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

}
