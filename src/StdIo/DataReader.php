<?php

declare(strict_types=1);

/**
 * Reading data from files
 * 
 * @author Sven Schrodt<sven@schrodt.nrw>
 * @link https://github.com/SchrodtSven/BuzzCode
 * @package BuzzCode
 * @version 0.1
 * @since 2025-10-30
 */


namespace SchrodtSven\BuzzCode\Stdio;

use InvalidArgumentException;
use SchrodtSven\BuzzCode\Type\Lst;

class DataReader
{
    

    protected string $cnt;
    protected array $dta;

    public function __construct(protected string $fn, bool $listfy=true)
    {
        $this->read();
        if($listfy) {
            $this->toArray();
        }
    }

    protected function read() :void
    {
        if(!file_exists($this->fn)) {
            throw new InvalidArgumentException("File does not exist:'{$this->fn}'");
        }

        $this->cnt = file_get_contents($this->fn); 
    }

    public function toArray(): self
    {
        $this->dta = explode(PHP_EOL, $this->cnt);
        if (empty($this->dta[array_key_last($this->dta)]))
            array_pop($this->dta);
        return $this;
    }

    public function getLst(bool $lsted = true): Lst | array
    {
        return ($lsted) ? new Lst($this->dta) : $this->dta;
    }

    public function raw(): string
    {
        return $this->cnt;
    }

    
}
