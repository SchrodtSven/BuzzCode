<?php

declare(strict_types=1);
/**
 * Class generating random buzzword-glued names -e.g:
 * 
 * - AbstractBaseSingletonFactoryJixBean
 * 
 * @author Sven Schrodt<sven@schrodt.nrw>
 * @link https://github.com/SchrodtSven/BuzzCode
 * @package BuzzCode
 * @version 0.1
 * @since 2025-10-23
 */

namespace SchrodtSven\BuzzCode\Core;

use ErrorException;
use OutOfBoundsException;
use OutOfRangeException;
use Random\Randomizer;

use SchrodtSven\BuzzCode\Stdio\DataReader;
use SchrodtSven\BuzzCode\Type\Lst;
use SchrodtSven\BuzzCode\Core\Config;

class Namer
{
    protected array $dta = [];
    protected Randomizer $rnd;
    protected static int $cntr = 0;
    protected array $actLst = [];
    protected string $actListNm = '';

    const CFG_FILE = 'prv/cfg.ini';

    public function __construct()
    {
        $this->init();
        $this->rnd = new Randomizer();
    }

    public function init(): void
    {
        // @FIXME: config.ini && parser!!!
        $tmp = Config::fromIni(self::CFG_FILE);
        foreach ($tmp->get('Namer') as $k => $v) {
            $this->dta[$k] = $this->read($v);
        }

    }

    /**
     * 
     */
    public function get(string $sbj = 'fillerz', bool $shuf = true): array
    {
        if (!array_key_exists($sbj, $this->dta)) {
            throw new ErrorException("Non-existing key ({$sbj})!");
        }
        $tmp = $this->dta[$sbj];
        return ($shuf) ? $this->rnd->shuffleArray($tmp) : $tmp;
    }

    public function actLst(string $sbj = 'fillerz', bool $shuf = true): void
    {
        if (!array_key_exists($sbj, $this->dta)) {
            throw new OutOfBoundsException("Non-existing key ({$sbj})!");
        }
        $tmp = $this->dta[$sbj];
        $this->actLst =  ($shuf) ? $this->rnd->shuffleArray($tmp) : $tmp;
        $this->actListNm = $sbj;
    }

    /**
     * (re) shuffle active list
     */
    public function reShufActLst(): self
    {
        $this->actLst = $this->rnd->shuffleArray($this->actLst);

        return $this;
    }

    public function read(string $fn): array
    {
        $rdr = new DataReader($fn);
        return $rdr->getLst(lsted: false);
    }

    public function drop(): string
    {
        if (count($this->actLst) == 0) {
            throw new ErrorException("Empty working list - use Namer::actLst()!");
        }
        if (static::$cntr % 2 == 0) {
            $s = array_pop($this->actLst);
        } else {
            $s = array_shift($this->actLst);
        }
        static::$cntr++;
        return $s;
    }

    public function dbg(int $mode = 23): void
    {
        var_dump([
            'data' => $this->actLst,
            'Counter' => static::$cntr,
            'active list' => $this->actListNm
        ]);
    }

    /**
     * Getting random buzzword glueing class name
     *
     * @param integer $wrdz
     * @return string
     */
    public function rndClsNm(int $wrdz = 6) : string
    {
        return $this->genNm($wrdz);
    }

    /**
     * Getting random buzzword glueing interface name
     *
     * @param integer $wrdz
     * @return string
     */
    public function rndIfNm(int $wrdz = 6) : string
    {
        return $this->genNm(wrdz: $wrdz, last: 'adjectives');
    }

    /**
     * Getting random buzzword glueing name
     *
     * @param integer $wrdz in [3..]
     * @return string
     */
    public function genNm(int $wrdz = 6, string $frst = 'starterz', string $last = 'finisherz') : string
    {
        if($wrdz < 3) 
            throw new OutOfRangeException("Minimum number of words is: 3");

        $lst = new Lst();
        $this->actLst($frst);
        $lst->push(ucfirst($this->drop()));
        $this->actLst();
        for ($i = 0; $i < $wrdz-2; $i++) {
            $lst->push(ucfirst($this->drop()));
        }
        $this->actLst($last);
        $lst->push(ucfirst($this->drop()));

        return (string) $lst->join('');
    }
}
