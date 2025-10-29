<?php

declare(strict_types=1);
/**
 * Creating Source Code from buzz wordz
 * 
 * @author Sven Schrodt<sven@schrodt.nrw>
 * @link https://github.com/SchrodtSven/BuzzCode
 * @package BuzzCode
 * @version 0.0.1
 * @since 2025-10-29
  */
namespace SchrodtSven\BuzzCode;

use Error;

class Sanitizer
{
    private array $dta;
    public array $prsd;

    

    public function __construct(private string $fn)
    {
        if(!file_exists($fn)) {
            throw new Error(sprintf("File %s not found", $fn));
        }
        $this->dta = explode(PHP_EOL, file_get_contents($fn));
        $this->preParse();
    }

    private function preParse()
    {

        foreach($this->dta as $row) {
            $itm = trim($row);
            if($itm !="" && !str_starts_with($itm, ";")) {
                $this->prsd[] = strtolower($itm);
            }
        }
        sort($this->prsd);
    }

}
