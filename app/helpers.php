<?php

if (!function_exists('pr')) {
    function pr($arr)
    {
        print_r("<pre>");
        print_r($arr);

        exit;
    }
}