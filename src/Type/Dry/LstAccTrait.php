<?php

declare(strict_types=1);
/**
 * Trait implementing Array Access for lists -  Type safing List (indexed; integer keyed array)
 * 
 * @author Sven Schrodt<sven@schrodt.nrw>
 * @link https://github.com/SchrodtSven/BuzzCode
 * @package BuzzCode
 * @version 0.0.1
 * @since 2025-10-29
 */

namespace SchrodtSven\BuzzCode\Type\Dry;
use SchrodtSven\BuzzCode\Type\Dry\TSLstAccTrait;

trait AccTrait
{
    use TSLstAccTrait;
   
    public function offsetSet(mixed $offset, mixed $val): void
    {
        $this->checkOffsetSet($offset, $val);
    }

    public function offsetExists(mixed $offset): bool
    {
        return $this->checkOffsetExists($this->cnt[$offset]);
    }

    public function offsetUnset(mixed $offset): void
    {
        $this->checkOffsetUnset($this->cnt[$offset]);
    }

    /**
     * @param [type] mixed $offset
     * @return mixed
     */
    public function offsetGet(mixed $offset): mixed
    {
        return $this->checkOffsetGet($this->cnt[$offset]);
    }
}
