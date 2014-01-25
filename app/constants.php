<?php


/*
 * Debug print function
 */
function pr($input, $die=0) {
    echo '<pre>';
    print_r($input);
    echo '</pre>';

    if($die) {
       die();
    }
}