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



class FltrTest extends TestCase
{
    #[TestWith([['Baz', 'Foo', 'Gaz', 'Guy', 'bar', 'nn'], 0])]
    #[TestWith([[23, 42, 3.145], 3])]
    #[TestWith([[99, 88, "fred", "barney", "Alice"], 2])]
    public function testIfGenericFltrWorxCorrectly(array $origin, int $count): void
    {
        $lst = new Lst($origin);
        $fltrd = $lst->genFltr(function ($val) {
            return is_numeric($val);
        });

        $this->assertTrue(count($fltrd) == $count);
    }

    #[TestWith([['Baz', 'Foo', 'Gaz', 'Guy', 'bar', 'nn'], 'prfx'])]
    #[TestWith([['Baz', 'Foo', 'Gaz', 'Guy', 'bar', 'nn'], '_SAVED'])]
    public function testIfWalkWorxCorrectly(array $origin, string $prfx): void
    {
        $lst = new Lst($origin);
        $tmp = $lst->raw();
        $lst->walk(function (&$val) use ($prfx) {
            $val = $prfx . "_{$val}";
        });

        for ($i = 0; $i < count($tmp); $i++) {
            $exp = $prfx . "_{$tmp[$i]}";
            //echo PHP_EOL, $fil[$i] ,PHP_EOL;
            $this->assertTrue($lst[$i] == $exp);
        }
    }

    #[TestWith([['Baz', 'Foo', 'Gaz', 'Guy', 'bar', 'nn'], 'prfx'])]
    #[TestWith([['Baz', 'Foo', 'Gaz', 'Guy', 'bar', 'nn'], '_SAVED'])]
    public function testIfMapWorxCorrectly(array $origin, string $prfx): void
    {
        $lst = new Lst($origin);
        $tmp = $lst->raw();
        $newLst = $lst->map(function ($val) use ($prfx) {
            return $prfx . "_{$val}";
        });

        for ($i = 0; $i < count($tmp); $i++) {
            $exp = $prfx . "_{$tmp[$i]}";
            //echo PHP_EOL, $fil[$i] ,PHP_EOL;
            $this->assertTrue($newLst[$i] == $exp);
        }
    }
}
