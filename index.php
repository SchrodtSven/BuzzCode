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
use SchrodtSven\BuzzCode\Type\Lst;

$foo = new Str('Lorem Ipsum jdshdu');


$nm = new Namer();
$lst = new Lst([]);
 for ($i = 0; $i < 15; $i++) {
            echo $nm->rndClsNm(8) . PHP_EOL;
            //echo $nm->rndIfNm(8) . PHP_EOL;
        }


$tmp = Config::fromIni('dta/vars.ini');

var_dump($tmp->get('varz'));