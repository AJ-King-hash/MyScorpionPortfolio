<?php
// Override SCRIPT_NAME to trick Laravel into seeing the base as '/' instead of '/api'
$_SERVER['SCRIPT_NAME'] = '/index.php';

require __DIR__ . "/../public/index.php";