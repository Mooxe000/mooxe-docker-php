<?php
namespace Mooxe\Lumen\Command;

use Symfony\Component\Console\Command\Command;

class CommandReinstall extends Command
{
  protected function configure()
  {
    $this
      ->setName('lumen:reinstall')
      ->setDescription('Install lumen.')
    ;
  }

  protected function execute()
  {
    Lumen::install();
  }
}
