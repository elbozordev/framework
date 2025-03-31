<?php

try {
    require __DIR__ . '/vendor/autoload.php';

    echo time();


} catch (Exception $e) {
    echo $e->getMessage();
}