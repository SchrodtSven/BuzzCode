<?php

declare(strict_types=1);
/**
 * Type safing List (indexed; integer keyed array)
 * 
 * @author Sven Schrodt<sven@schrodt.nrw>
 * @link https://github.com/SchrodtSven/BuzzCode
 * @package BuzzCode
 * @version 0.0.1
 * @since 2025-11-03
 */

namespace SchrodtSven\BuzzCode\Type\Dry;

trait TSLstAccTrait
{

   
    public function checkOffsetSet(int $offset, mixed $val): void
    {

        if (is_null($offset)) {
            $this->cnt[] = $val;
        } else {
            $this->cnt[$offset] =  $val;
        }
    }

    public function checkOffsetExists(int $offset): bool
    {
        return isset($this->cnt[$offset]);
    }

    public function checkOffsetUnset(int $offset): void
    {
        unset($this->cnt[$offset]);
    }

    /**
     * @param [type] int $offset
     * @return mixed
     */
    public function checkOffsetGet(int $offset): mixed
    {
        return isset($this->cnt[$offset]) ? $this->cnt[$offset] : null;
    }
}
