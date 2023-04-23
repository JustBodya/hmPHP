<?php
define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT']);

$value = 'The recording was successful';
$suf = "dir";

_log($value, $suf);

function _log($str, $suffix)
{
    counter();
    if (!is_dir(ROOT_DIR . "/logs" . "/$suffix")) {
        if (!is_dir("logs")) {
            $mainPath = mkdir(ROOT_DIR . "/logs");
            mkdir(ROOT_DIR . "/logs" . "/$suffix");
        } else {
            mkdir(ROOT_DIR . "/logs" . "/$suffix");
        }
    }

    if (is_array($str)) {
        $str = json_encode($str, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    $file = fopen(ROOT_DIR . "/logs//" . $suffix . "/logs.txt", "a+");

    fputs($file, date('Y-m-d H:i:s') . " $str" . "\n");
}

function counter()
{
    $counterFile = ROOT_DIR . "/counter.txt"; // Доп. задание
    if (file_exists($counterFile)) {
        $count = file_get_contents($counterFile);
    } else {
        $count = 0;
    }
    file_put_contents($counterFile, ++$count);
}
