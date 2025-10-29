<?php

declare(strict_types=1);
/**
 * Example Container Class, deemonstrating property hookz
 * 
 * @author Sven Schrodt<sven@schrodt.nrw>
 * @link https://github.com/SchrodtSven/BuzzCode
 * @package BuzzCode
 * @version 0.1
 * @since 2025-10-29
 */


namespace SchrodtSven\BuzzCode\Core;

use DateTime;


class Container
{
    public int $id {
        get => $this->id;
        set(int $val) {
            $this->id = $val;
        }
    }

    public DateTime $crtd {
        get => $this->crtd;
        set(DateTime $val) {
            $this->crtd = $val;
        }
    }

    public DateTime $mdfd {
        get => $this->mdfd;
        set(DateTime $val) {
            $this->mdfd = $val;
        }
    }

    public function __construct(private mixed $dta = null)
    {
        $this->crtd = new DateTime();
    }

    public function touch(): self
    {
        $this->mdfd = new DateTime();
        return $this;
    }

    protected function create()
    {
         $this->crtd = new DateTime();
         // .... parse $this->dta
         $this->touch();
    }
}



$foo = new Container([12, 33]);
$foo->id = 1234;

var_dump($foo->touch());
