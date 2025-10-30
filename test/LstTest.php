<?php

declare(strict_types=1);
/**
 * Unit test on list class's:
 * 
 * - stack operations using Depends attribute
 * 
 * @author Sven Schrodt<sven@schrodt.nrw>
 * @link https://github.com/SchrodtSven/BuzzCode
 * @package BuzzCode
 * @version 0.1
 */

use PHPUnit\Framework\Attributes\Depends;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\TestWith;

use SchrodtSven\BuzzCode\Type\Lst;



class LstTest extends TestCase
{
    #[TestWith([['Baz', 'Foo', 'Gaz', 'Guy', 'bar', 'nn'], 6])]
    #[TestWith([[23, 42, 3.145], 3])]
    #[TestWith([[99, 88, "fred", "barney", "Alice"], 5])]
    public function testIfCountWorxCorrectly(array $origin, int $count): void
    {   
        $lst = new Lst($origin);
        $this->assertTrue(count($lst) == $count);
        $r = new \Random\Randomizer;
        $lst[] = 'Foo' . (string) $r->nextFloat();
        $this->assertTrue(count($lst) == $count +1);
    }    
}
