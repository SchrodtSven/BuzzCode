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

#$foo = parse_ini_file("tmp/cfg.ini", true);

#$foo = Config::fromIni("prv/cfg.ini");
$nm = new Namer();
//var_dump($foo->get('Namer'));


var_dump($nm->rndClsNm());