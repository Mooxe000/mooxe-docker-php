<?php
namespace Mooxe\Lumen\Command;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Process\Process;

/*
 * lumen:clean
 * lumen:install
 * lumen:reinstall
 * lumen:start
 */
class Lumen
{
  private static function processWrapper($exec_path, $commander)
  {
    $process = new Process($commander);
    $process->setWorkingDirectory($exec_path);
    $process->setTimeout(null);
    $process->run(function ($type, $buffer) {
      echo $buffer;
    });

    // executes after the command finishes
    if (!$process->isSuccessful()) {
        throw new \RuntimeException($process->getErrorOutput());
    }

    echo $process->getOutput();
  }

  public static function clean()
  {
    $root_path = realpath(__DIR__.'/..');
    $lumen_path = realpath($root_path.'/lumen');

    $fs = new Filesystem();

    if($fs->exists($lumen_path))
    {
      try {
        $fs->remove($lumen_path);
        echo $lumen_path . " is removed.\n";
      } catch (IOExceptionInterface $e) {
        echo "An error occurred while removing your directory at ".$e->getPath();
      }
    }
  }

  public static function install()
  {
    $root_path = realpath(__DIR__.'/..');
    $commander = 'composer create-project laravel/lumen --prefer-dist';
    self::processWrapper($root_path, $commander);
  }

  public static function reinstall()
  {
    self::clean();
    self::install();
  }

  public static function start()
  {
    $lumen_path = realpath(__DIR__.'/../lumen');
    $commander = 'php artisan serve --host=0.0.0.0';
    self::processWrapper($lumen_path, $commander);
  }

}
