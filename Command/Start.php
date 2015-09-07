<?php
namespace Mooxe\Lumen\Command;

use Symfony\Component\Console\Command\Command;

class CommandStart extends Command
{
  protected function configure()
  {
    $this
      ->setName('lumen:start')
      ->setDescription('Start lumen server.')
    ;
  }

  protected function execute()
  {
    Lumen::start();
  }
}
