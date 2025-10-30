<?php

declare(strict_types=1);
/**
 * Class for OOP-style fluent interface to strings
 * 
 * @author Sven Schrodt<sven@schrodt.nrw>
 * @link https://github.com/SchrodtSven/BuzzCode
 * @package BuzzCode
 * @version 0.0.1
 * @since 2025-10-29
  */

namespace SchrodtSven\BuzzCode\Type;
use SchrodtSven\BuzzCode\Type\Lst;
use Stringable;

class Str implements Stringable
{
    public function __construct(private string | Stringable $cnt) // Content holding member (attr))
    {
        if(!is_string($this->cnt)) {
            $this->cnt = (string) $cnt;
        }
    }

    public function repl(array|string $s, array|string $r, $inpl=true) : self
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

    public function raw(): string
    {
        return $this->cnt;
    }
    /**
     * Lower case string
     */
    public function low($inpl=true): self
    {
        return $this->generic("strtolower", $inpl);
    }

    /**
     * Upper case string
     */
    public function up($inpl=true): self
    {
        return $this->generic("strtoupper", $inpl);
    }

    /**
     * Upper case first character string
     */
    public function ucf($inpl=true): self
    {
        return $this->generic("ucfirst", $inpl);
    }

    /**
     * Lower case first character string
     */
    public function lcf($inpl=true): self
    {
        return $this->generic("lcfirst", $inpl);
    }

    /**
     * Generic function applying callable
     */
    public function generic(callable $callback, $inpl=true): self
    {
        $tmp = $callback($this->cnt);
        if ($inpl) {
            $this->cnt = $tmp;
            return $this;
        } else {
             return new self($tmp);
        }
    }

    public function spltBy(Stringable|string $sep): Lst
    {
        return new Lst(explode($sep, $this->cnt));
    }

    public function splt(){}

    public function begins(string $txt): bool
    {
        return str_starts_with($this->cnt, $txt);
    }

    public function ends(string $txt): bool
    {
        return str_ends_with($this->cnt, $txt);
    }

    public function contains(string $txt): bool
    {
        return str_contains($this->cnt, $txt);
    }
}

