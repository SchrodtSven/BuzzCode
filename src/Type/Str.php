<?php

declare(strict_types=1);
/**
 * Class for OOP-style fluent interface to strings
 * 
 * @author Sven Schrodt<sven@schrodt.nrw>
 * @link https://github.com/SchrodtSven/BuzzCode
 * @package BuzzCode
 * @version 0.0.1
 * @since 2025-10-28 
  */

namespace SchrodtSven\BuzzCode\Type;

use Stringable;

class Str implements Stringable
{
    public function __construct(private string | Stringable $cnt) // Content holding member (attr))
    {
        if(!is_string($this->cnt)) {
            $this->cnt = (string) $cnt;
        }
    }

    public function repl(array|string $s, array|string $r, $inpl=true) : Str
    {
        $tmp = str_replace($s, $r, $this->cnt);
        if($inpl) {
            $this->cnt = $tmp;
            return $this;
        } else {
            return new self($tmp);
        }
    }

    public function __toString(): string
    {
        return $this->cnt;
    }
}

