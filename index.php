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
use SchrodtSven\BuzzCode\SrcBld\TplRndr;
use SchrodtSven\BuzzCode\Core\CodeBuilder;

$prsr = new TplRndr('tpl/Class.tpl');

$prsr->info="Best class ever!!!";
$prsr->cn="TechMeck";
$prsr->FOO="\$a = 23;";
$prsr->ns="\\Foo";
//var_dump($prsr);
//var_dump("{{info}}" === '{{info}}' );
echo $prsr;




$prsr->load('tpl/Codelets/Foreach.tpl');
$prsr->obj='$dta';
$prsr->itm='$k => $val';
$prsr->stuff='trim($itm)';

echo $prsr;

$cb = new CodeBuilder();

$cb->incLvl()->incLvl()->incLvl();
echo PHP_EOL;
echo $cb->assgn('foo', '23');
//var_dump($cb);
echo PHP_EOL;
$cb->lvl=0;
echo $cb->assgn('foo', '23');



echo PHP_EOL;


use SchrodtSven\BuzzCode\RevEng\AttrRdr;

$ar = new AttrRdr(\SchrodtSven\BuzzCode\Foo::class);

var_dump($ar->attr());