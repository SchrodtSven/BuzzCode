<?php

declare(strict_types=1);
/**
 * Creating Source Code from buzz wordz
 * 
 * @author Sven Schrodt<sven@schrodt.nrw>
 * @link https://github.com/SchrodtSven/BuzzCode
 * @package BuzzCode
 * @version 0.0.1
 * @since 2025-10-28 
  */

namespace SchrodtSven\BuzzCode\Core;


class CodeBuilder
{
    protected const string ASSGN = "%s$%s = %s;"; // {TB_SZ}{VARNAME} = {VALUE};


    protected const int TB_SZ = 4;

    public int $lvl = 0 {
        get {
            return $this->lvl;
        }
        set(int $val) {
            $this->lvl = $val;
        }
    }

    public function incLvl(): self
    {
      ++$this->lvl;
      return $this;
    }

    public function decLvl(): self
    {
      if($this->lvl >0) ++$this->lvl;
      return $this;
    }

    public function assgn($var, $val): string
    {
      $TB_SZ = str_repeat(' ', $this->lvl * self::TB_SZ);
      return sprintf(self::ASSGN, $TB_SZ, $var, $val); // {TB_SZ}{VARNAME} = {VALUE};
    }

}

