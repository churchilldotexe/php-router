<?php

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}


function isUrl($url): bool
{
    return $_SERVER['REQUEST_URI'] === $url;
}
