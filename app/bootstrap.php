<?php
    // load config
    require_once 'config/config.php';
    // load helper methods
    require_once 'helpers/url_helpr.php';
    require_once 'helpers/session_helpr.php';
    // autoload Core libraries
    spl_autoload_register(function($className) {
        // filename needs to match the className
        require_once 'libraries/' . $className . '.php';
    });
?>