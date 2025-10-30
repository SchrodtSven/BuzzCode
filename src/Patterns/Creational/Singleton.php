<?php

declare(strict_types=1);
/**
 * Example class for a Singleton pattern
 * 
 * @author Sven Schrodt<sven@schrodt.nrw>
 * @link https://github.com/SchrodtSven/BuzzCode
 * @package BuzzCode
 * @version 0.1
 * @since 2025-10-30
 */


namespace SchrodtSven\BuzzCodePatterns;

class Singleton
{   
    private static ?self $_instance = null;

    private function __construct()
    {
    }

    /**
     * Not being cloneable.
     */
    private function __clone()
    {
    }

    public static function getInstance(): self
    {
        if(is_null(self::$_instance))
            self::$_instance = new self();

        return self::$_instance;
    }
   
}
