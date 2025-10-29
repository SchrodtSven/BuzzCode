<?php

declare(strict_types=1);
/**
 * Testing Str
 * 
 * @see 
 * 
 * @author Sven Schrodt<sven@schrodt.nrw>
 * @link https://github.com/SchrodtSven/BuzzCode
 * @package BuzzCode
 * @version 0.1
 * @since 2023-04-26
 */

use PHPUnit\Framework\TestCase;
use SchrodtSven\BuzzCode\Type\Str;

class TestNewTest extends TestCase
{
    public function testBasix(): void
    {
       $str = new Str("Lorem ipsum");
       $this->assertSame("lorem ipsum", $str->low()->raw());
    }   


    
     

}