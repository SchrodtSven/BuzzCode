<?php

declare(strict_types=1);
/**
 * Trait supporting array filters
 * 
 * @author Sven Schrodt<sven@schrodt.nrw>
 * @link https://github.com/SchrodtSven/BuzzCode
 * @package BuzzCode
 * @version 0.0.1
 * @since 2025-10-31
 */

namespace SchrodtSven\BuzzCode\Type\Dry;
use SchrodtSven\BuzzCode\Type\Lst;

trait FltrTrait
{

    public function genFltr(callable $callback, $mode = \ARRAY_FILTER_USE_BOTH ): ?static
    {
        return new static(array_filter($this->cnt, $callback, $mode));
    }
    
}
