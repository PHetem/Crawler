<?php

require_once dirname(__FILE__).'/../vendor/autoload.php';

define('ROOT_PATH', dirname(__FILE__, 2));
define('CACHE_PATH', ROOT_PATH . '/public/result/');

if (!is_writeable(CACHE_PATH))
    throw new Exception('Insufficient permissions to write to results folder.');