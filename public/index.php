<?php

use APIModule\Framework\Bootstrap;

try {
    include_once(__DIR__ . '/../config/config.php');
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}

Bootstrap::handle();