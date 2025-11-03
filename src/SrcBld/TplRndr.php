<?php

declare(strict_types=1);
/**
 * Very simple template renderer
 * 
 * @author Sven Schrodt<sven@schrodt.nrw>
 * @link https://github.com/SchrodtSven/BuzzCode
 * @package BuzzCode
 * @version 0.1
 * @since 2025-11-03
 */


namespace SchrodtSven\BuzzCode\SrcBld;

class TplRndr
{
    protected const string PLC_HLD = "{{%s}}";

    protected array $varz;

    protected string $tpl;

    public function __construct(protected string $fn)
    {
        $this->tpl = file_get_contents($fn);
    }

    public function __set($nm, $val)
    {
        $this->varz[$nm] = $val;
    }

    public function __get($nm)
    {
        return $this->varz[$nm] ?? null;
    }

    public function rndr(): string
    {
        foreach ($this->varz as $idx => $itm) {
            $this->tpl = str_replace(
                sprintf(self::PLC_HLD, $idx),
                $itm,
                $this->tpl
            );

        }
        //@FIXME remove every {{*}} stuff left!
        return $this->tpl;
    }

    public function __toString(): string 
    {
        return $this->rndr();
    }
}
