<?php

$value = 'The recording was successful';
$suf = "newDir";

_log($value, $suf);
function _log($str, $suffix)
{
    if (is_array($str)) {
        $str = json_encode($str, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    if (!is_dir($suffix)) {
        mkdir($suffix);
    }

    $file = fopen(getcwd() . "/" . $suffix . "/someFile.txt", "a+");

    fputs($file, "$str, date of recording is " . date('Y-m-d H:i:s') . "\n");

    fclose($file);
}