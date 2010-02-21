<?php

error_reporting(E_ALL | E_STRICT);

define('APPLICATION_PATH', realpath(dirname(__FILE__)));
set_include_path(
    APPLICATION_PATH . PATH_SEPARATOR . get_include_path()
);
set_include_path(
    APPLICATION_PATH . '/tests' . PATH_SEPARATOR . get_include_path()
);