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


#var_dump(new Sanitizer('dta/BuzzwordsClassVarzMembers.txt'));

$foo = new Str("Ha loo ll");

echo $foo->repl(" ", "__");