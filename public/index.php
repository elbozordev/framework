<?php

try {
    require_once('../vendor/autoload.php');

    echo time();


} catch (Exception $e) {
    echo $e->getMessage();
}