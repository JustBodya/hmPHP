<?php
define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT']);

$value = [
    'a' => [
        'a',
        'b',
        'c'
    ],
    'b' => [
        'd',
        'e',
        'f'
    ]
];
$suf = "dir";

_log($value, $suf);

function _log($str, $suffix = "logs")
{
    counter();

    if (!is_dir(ROOT_DIR . "/logs" . "/$suffix")) {
        if (!is_dir("logs")) {
            mkdir(ROOT_DIR . "/logs");
        }
        mkdir(ROOT_DIR . "/logs" . "/$suffix");
    }

    if (is_array($str)) {
        $str = print_r($str, 1);
    }

    $file = fopen(ROOT_DIR . "/logs" . "/$suffix" . "/file.txt", "a+");

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
