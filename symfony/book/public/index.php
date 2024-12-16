<?php

use App\Kernel;

# ROUTER INDEX PHP :
# THis is to be able to proxy 0.0.0.0:8000, access to /admin in JS (resolve file and and make ".jsonld" to be resolved
# @todo create a keploy runtime to handle a router to be able to keep index.php safe :pray:
if (preg_match('/_wdt/', $_SERVER["REQUEST_URI"]) === true || preg_match('/\.(?:png|jpg|jpeg|gif|js|css)$/', $_SERVER["REQUEST_URI"])) {
    return false;
}

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
