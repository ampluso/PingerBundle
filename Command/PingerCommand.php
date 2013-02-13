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
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Ampluso\PingerBundle\Pinger\Pinger;

class PingerCommand extends ContainerAwareCommand
{

    /**
     * Configure PingerBundle Command
     */
    protected function configure()
    {
        $this
            ->setName('pinger:url')
            ->setDescription('PingerBundle service')
            ->addArgument('url', InputArgument::REQUIRED, 'URL to pinger')
        ;
    }

    /**
     * Execute command ping serives
     * 
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $url = $input->getArgument('url');
        $output->writeln('<info>Start pinger:</info> <comment>'.$url.'</comment>');

        $pinger = new Pinger();
        // test ping
        $service = 'http://blogsearch.google.com/ping/RPC2';

        $output->writeln('<info>Ping:</info> <comment>'.$url.'</comment> <info>-></info> <comment>'.$service.'</comment>');
        
        echo $pinger->pingService($url, $service);

        $output->writeln('<info>Stop pinger:</info> <comment>'.$url.'</comment>');
    }

}
