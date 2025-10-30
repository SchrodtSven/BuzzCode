<?php

declare(strict_types=1);

/**
 * Operations on directories
 * 
 * @author Sven Schrodt<sven@schrodt.nrw>
 * @link https://github.com/SchrodtSven/BuzzCode
 * @package BuzzCode
 * @version 0.1
 * @since 2025-10-30
 */


namespace SchrodtSven\BuzzCode\Stdio\Apps;

class Dir
{
     /**
     * Generic function getting directory content recursivly by file extension
     */
    public static function getRecByExt(string $pth = '.', string $ext = 'php'): array
    {
        $dir = new \RecursiveDirectoryIterator($pth, \FilesystemIterator::FOLLOW_SYMLINKS);
        $itr = new \RecursiveIteratorIterator($dir);
        $flz = [];
        foreach ($itr as $itm) {
            if ($itm->getExtension() == $ext)
                $flz[] = $itm->getPathname();
        }

        return $flz;
    }

    /**
     * Generic function getting directory content recursivly by callback
     */
    public static function getRecByGen(callable $callback, string $pth = '.'): array
    {
        $dir = new \RecursiveDirectoryIterator($pth, \FilesystemIterator::FOLLOW_SYMLINKS);
        $itr = new \RecursiveIteratorIterator($dir);
        $flz = [];
        foreach ($itr as $itm) {
            if ($callback($itm))
                $flz[] = $itm->getPathname();
        }

        return $flz;
    }
}
