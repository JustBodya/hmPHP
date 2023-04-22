<?php

$value = 'The recording was successful';
$suf = "newDir";

_log($value, $suf);
function _log($str, $suffix)
{
    $counterFile = getcwd() . "/counter.txt"; // Доп. задание
    if (file_exists($counterFile)) {
        $count = file_get_contents($counterFile);
    } else {
        $count = 1;
    }
    file_put_contents($counterFile, ++$count);


    if (is_array($str)) {
        $str = json_encode($str, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    if (!is_dir($suffix)) {
        mkdir($suffix);
    }

    $file = fopen(getcwd() . "/" . $suffix . "/logs.txt", "a+");

    fputs($file, "$str, date of recording is " . date('Y-m-d H:i:s') . "\n");

    fclose($file);
}