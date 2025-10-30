<?php

declare(strict_types=1);
/**
 * Trait to be used, when classes have to deal with Errors/Exceptions without repeating code
 * 
 * @author Sven Schrodt<sven@schrodt.nrw>
 * @link https://github.com/SchrodtSven/BuzzCode
 * @package BuzzCode
 * @version 0.1
 * @since 2025-10-30
 */


namespace SchrodtSven\BuzzCode\Core\Dry;
use RuntimeException;

trait ErrorTrait
{
    public static function fileExist(string $fn, string $msg = 'An error occured!'): void
    {
        if(!file_exists($fn)) {
            throw new RuntimeException($msg);
        }

    }
}



