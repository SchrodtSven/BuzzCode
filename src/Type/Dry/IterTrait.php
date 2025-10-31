<?php

declare(strict_types=1);
/**
 * Trait implementing Array Access - allowing to access content (cnt) via [] operator
 * 
 * @author Sven Schrodt<sven@schrodt.nrw>
 * @link https://github.com/SchrodtSven/BuzzCode
 * @package BuzzCode
 * @version 0.0.1
 * @since 2025-10-29
 */

namespace SchrodtSven\BuzzCode\Type\Dry;

trait IterTrait
{
    public function rewind(): void
    {
        $this->pos = 0;
    }


    public function current(): mixed
    {
        return $this->cnt[$this->pos];
    }


    public function key(): mixed
    {
        return $this->pos;
    }

    public function next(): void
    {
        ++$this->pos;
    }

    public function valid(): bool
    {
        return isset($this->cnt[$this->pos]);
    }
}
