<?php

declare(strict_types=1);
/**
 * Testing SingletonCaseTest
 * 
 * @author Sven Schrodt<sven@schrodt.nrw>
 * @link https://github.com/SchrodtSven/BuzzCode
 * @package BuzzCode
 * @version 0.1
 * @since 2023-04-30
 */

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use SchrodtSven\BuzzCode\Patterns\Impl\SingletonCase;

class SingletonCaseTest extends TestCase
{

    public function testBasix(): void
    {
        $foo = SingletonCase::getInstance();
        $bar = SingletonCase::getInstance();

        $this->assertTrue($foo === $bar);

    }

    public function testIfExceptionIsThrownByCloning(): void
    {
        $bar = SingletonCase::getInstance();
        $this->expectException(Error::class);
        $baz = clone $bar;
    }

    public function testIfExceptionIsThrownByInstantiatingTry(): void
    {
        $this->expectException(Error::class);
        $baz = new SingletonCase();
    }
}
