<?php

declare(strict_types=1);
/**
 * Class for OOP-style fluent interface to arrays
 * 
 * @author Sven Schrodt<sven@schrodt.nrw>
 * @link https://github.com/SchrodtSven/BuzzCode
 * @package BuzzCode
 * @version 0.0.1
 * @since 2025-10-29
  */

namespace SchrodtSven\BuzzCode\Type;

use SchrodtSven\BuzzCode\Type\Dry\AccTrait;
use SchrodtSven\BuzzCode\Type\Dry\IterTrait;

class Lst implements \Countable, \Iterator, \ArrayAccess, \Stringable
{
    private int $pos;
    USE IterTrait;
    use AccTrait;

    /**
     * @FIXME implement support for $step param
     *
     * @param integer $offset
     * @param integer $length
     * @param integer $step
     * @return void
     */
    public function slice(int $offset, int $length, int $step=1)
    {
        return array_slice($this->cnt, $offset, $length);
    }

    public function head(int $number=5)
    {
        return $this->slice(0, $number);
    }

    public function tail(int $number=5)
    {
        return $this->slice(count($this->cnt), $number*-1);
    }

    public function __toString(): string
    {
        return var_export($this->cnt, true);
    }

    public function __construct(private array  $cnt) // Content holding member (attr))
    {

    }

    
    public function raw(): array
    {
        return $this->cnt;
    }

    public function count(): int
    {
        return count($this->cnt);
    }

    public function keys(): static
    {
        return new static(array_keys($this->cnt));
    }


    /**
     * Pop the element off the end of array
     */
    public function pop(): mixed
    {
        return array_pop($this->cnt);
    }

    /**
     * 
     */
    public function push(mixed $val): self
    {
        array_push($this->cnt, $val);
        return $this;
    }

    /**
     * Shift an element off the beginning of array
     */
    public function shift(): mixed
    {
        return array_shift($this->cnt);
    }

    /**
     * Unshift an element to the beginning of array
     */
    public function unshift(mixed $val): self
    {
        array_unshift($this->cnt, $val);
        return $this;
    }

    public function unique(int $flags = \SORT_STRING): static
    {
        return new static (array_unique($this->cnt, $flags));
    }

    public function sum(): int|float
    {
        return array_sum($this->cnt);
    }

    public function sort(): static
    {
        sort($this->cnt);
        return $this;
    }

    /**
     * Returning new instance of static, sorted
     */
    public function sorted(): static
    {
        $tmp = $this->raw();
        sort($tmp);
        return new static($tmp);
    }

    /**
     * Remove empty elements from list
     */
    public function rmvEmpty($inpl = true) {}

    public function join(string $glue) : Str
    {
        return new Str(implode($glue, $this->cnt));
    }

}

