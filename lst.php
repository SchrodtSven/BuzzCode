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

$foo = [23, 42 ,666 ,9, 8];

$bar = new Lst($foo);
$bar->sort();
$bar->unshift(1023);
var_dump($bar->slice(3,8));

foreach($bar as $itm)
    printf("%s%s", $itm, PHP_EOL);

print(count($bar));
echo PHP_EOL;
print_r($bar->tail(2));

