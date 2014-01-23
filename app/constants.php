<?php
// States constants have values mapping to  object states table

define("USER_SUSPENDED", 1);

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