<?php
$fn ="_all.txt";
$dta = explode(PHP_EOL, file_get_contents($fn));
echo "[" . PHP_EOL;
foreach($dta as $itm) {

    printf('["%s", "%s", "%s", "%s"]%s',
            strtolower($itm),
            strtoupper($itm),
            lcfirst($itm),
            ucfirst($itm),
            PHP_EOL
    );
}

echo "];" . PHP_EOL;