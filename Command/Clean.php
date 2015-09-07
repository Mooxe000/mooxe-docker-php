<?php
namespace Mooxe\Lumen\Command;

use Symfony\Component\Console\Command\Command;

class CommandClean extends Command
{
  protected function configure()
  {
    $this
      ->setName('lumen:clean')
      ->setDescription('Clean lumen directory.')
    ;
  }

  protected function execute()
  {
    Lumen::clean();
  }
}
