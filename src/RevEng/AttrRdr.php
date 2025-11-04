<?php

declare(strict_types=1);
/**
 * Classing reading attributes from classes
 * 
 * @author Sven Schrodt<sven@schrodt.nrw>
 * @link https://github.com/SchrodtSven/BuzzCode
 * @package BuzzCode
 * @version 0.1
 * @since 2025-11-03
 */

namespace SchrodtSven\BuzzCode\RevEng;

class AttrRdr
{
    protected $currCls;

    protected array $attr;

    public function __construct(string $cn)
    {
        // Using reflection to read attributes:
        $this->currCls = new \ReflectionClass($cn);
        $this->attr = $this->currCls->getAttributes();
    }

    public function attr(): array
    {
        return $this->attr;
    }
}
