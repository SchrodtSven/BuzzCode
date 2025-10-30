<?php
#$fn ="dta/mta_sntx.txt";
$fn ='dta/finisher_nm.txt';
$dta = explode(PHP_EOL, file_get_contents($fn));
//echo "[" . PHP_EOL;

$srtd = [];

foreach($dta as $itm) {
    $srtd[] =  strtolower($itm);
    // printf('["%s", "%s", "%s", "%s"]%s',
    //         strtolower($itm),
    //         strtoupper($itm),
    //         lcfirst($itm),
    //         ucfirst($itm),
    //         PHP_EOL
    // );
}

//echo "];" . PHP_EOL;


sort($srtd);

echo implode(PHP_EOL, $srtd);