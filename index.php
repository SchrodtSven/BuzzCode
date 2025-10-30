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

use SchrodtSven\BuzzCode\Core\Config;
use SchrodtSven\BuzzCode\Core\Namer;
use SchrodtSven\BuzzCode\Type\Str;

$foo = new Str('Lorem Ipsum jdshdu');

var_dump($foo->splt(5));
