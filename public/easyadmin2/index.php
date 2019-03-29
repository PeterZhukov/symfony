<?php

unset($_SERVER['REDIRECT_BASE']);
unset($_SERVER['BASE']);
$_SERVER['SCRIPT_FILENAME'] = str_ireplace('/easyadmin2', '/', $_SERVER['SCRIPT_FILENAME']);
$_SERVER['SCRIPT_NAME'] = str_ireplace('/easyadmin2', '/', $_SERVER['SCRIPT_NAME']);
$_SERVER['PHP_SELF'] = str_ireplace('/easyadmin2', '/', $_SERVER['PHP_SELF']);

require_once __DIR__ .'/../index.php';
