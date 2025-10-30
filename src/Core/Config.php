<?php

declare(strict_types=1);
/**
 * Class managing config (meta) information
 * 
 * @author Sven Schrodt<sven@schrodt.nrw>
 * @link https://github.com/SchrodtSven/BuzzCode
 * @package BuzzCode
 * @version 0.1
 * @since 2025-10-29
 */


namespace SchrodtSven\BuzzCode\Core;

use Error;
use SchrodtSven\BuzzCode\StdIo\ErrMsg;
use SchrodtSven\BuzzCode\Core\Dry\ErrorTrait;

class Config
{
    use ErrorTrait;

    public function __construct(protected array $cfg)
    {
        
    }

    public static function fromIni(string $fn): self
    {
        self::fileExist($fn, sprintf(ErrMsg::F_404, $fn));

        return new self(parse_ini_file($fn, true));
    }

    public function get(string $key=''): ?array
    {
        return ($key =='') 
                ? $this->cfg
                : $this->cfg[$key] ?? null;
    }
}