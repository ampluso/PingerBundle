<?php

/*
 * This file is part of PingerBundle.
 *
 * (c) Marcin Chyłek <marcin@chylek.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ampluso\PingerBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PingerCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('pinger:url')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        
    }

}
