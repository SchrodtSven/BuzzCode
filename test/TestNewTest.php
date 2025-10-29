<?php

declare(strict_types=1);
/**
 * Testing TestNew
 * 
 * @see 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/P8Three
 * @package P8Three
 * @version 0.1
 * @since 2023-04-26
 */

use PHPUnit\Framework\TestCase;
use SchrodtSven\P8Three\New\TestNew;

class TestNewTest extends TestCase
{
    public function testBasix(): void
    {
       $t = new TestNew();

       $this->assertSame((string) $t->getContent(), 'Foo');
    }   


    
     

}