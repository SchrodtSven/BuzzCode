<?php

$tpl = 'html_global_attr[] = "%s"%s';

$file = 'grube.txt';
foreach(file($file) as $itm) {
    //$itm = str_replace(PHP_EOL, "", $itm);
    printf($tpl, trim($itm), PHP_EOL);
}