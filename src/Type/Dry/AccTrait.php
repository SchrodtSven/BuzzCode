<?php

declare(strict_types=1);
/**
 * Trait implementing Array Access - allowing to access dta via [] operator
 * 
 * @author Sven Schrodt<sven@schrodt.nrw>
 * @link https://github.com/SchrodtSven/BuzzCode
 * @package BuzzCode
 * @version 0.0.1
 * @since 2025-10-29
 */

namespace SchrodtSven\BuzzCode\Type\Dry;

trait AccTrait
{

   
    public function offsetSet($offset, $val): void
    {

        if (is_null($offset)) {
            $this->cnt[] = $val;
        } else {
            $this->cnt[$offset] = $val;
        }
    }

    public function offsetExists($offset): bool
    {
        return isset($this->cnt[$offset]);
    }

    public function offsetUnset($offset): void
    {
        unset($this->cnt[$offset]);
    }

    /**
     * @param [type] $offset
     * @return mixed
     */
    public function offsetGet($offset): mixed
    {
        return isset($this->cnt[$offset]) ? $this->cnt[$offset] : null;
    }
}
