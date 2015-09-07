#!/usr/bin/env php
<?php

require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console\Application;
use Mooxe\Lumen\Command\CommandClean;
use Mooxe\Lumen\Command\CommandInstall;
use Mooxe\Lumen\Command\CommandReinstall;
use Mooxe\Lumen\Command\CommandStart;

$application = new Application();
$application->add(new CommandClean());
$application->add(new CommandInstall());
$application->add(new CommandReinstall());
$application->add(new CommandStart());
$application->run();
