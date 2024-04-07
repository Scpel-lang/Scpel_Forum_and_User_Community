<?php

function parse_env($file)
{
    $env = array();
    if (file_exists($file)) {
        $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') !== 0) { // Skip commented lines
                list($key, $value) = explode('=', $line, 2);
                $env[$key] = trim($value);
            }
        }
    }
    return $env;
}
