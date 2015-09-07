<?php
namespace Mooxe\Lumen\Command;

use Symfony\Component\Console\Command\Command;

class CommandInstall extends Command
{
  protected function configure()
  {
    $this
      ->setName('lumen:install')
      ->setDescription('Install lumen.')
    ;
  }

  protected function execute()
  {
    Lumen::install();
  }
}
