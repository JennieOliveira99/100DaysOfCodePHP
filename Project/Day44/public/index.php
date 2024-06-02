<?php

require 'bootstrap.php';
router();
require __DIR__.'/vendor/autoload.php';
use  App\controller\pages\Home;
echo Home ::getHome();