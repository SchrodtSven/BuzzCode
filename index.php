<?php 
declare(strict_types=1);
/**
 * Index File for test/debug purposes
 * 
 * @author Sven Schrodt<sven@schrodt.nrw>
 * @link https://github.com/SchrodtSven/BuzzCode
 * @package BuzzCode
 * @version 0.0.1
 * @since 2025-10-29
  */


require_once 'src/Autoload.php';

use SchrodtSven\BuzzCode\Sanitizer;
use SchrodtSven\BuzzCode\Type\Str;
use SchrodtSven\BuzzCode\Type\Lst;
use SchrodtSven\BuzzCode\Stdio\Apps\Dir;
use SchrodtSven\BuzzCode\Stdio\DataReader;
use SchrodtSven\BuzzCode\Core\Namer;
use SchrodtSven\BuzzCode\Patterns\Impl\SingletonCase;

//$r = new DataReader('dta/names/starter.txt');

$foo = SingletonCase::getInstance();
$bar = SingletonCase::getInstance();

var_dump($foo === $bar);
//$baz = clone $bar;

$baz = new SingletonCase();