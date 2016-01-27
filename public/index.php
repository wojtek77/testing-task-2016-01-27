<?php

/* my debug functions */
function v($v, $clearHtmlAndExit = false) { if ($clearHtmlAndExit) ob_end_clean(); echo '<pre>'; var_dump($v); echo '</pre>'; if ($clearHtmlAndExit) exit; } function vv($var, $level = 3, & $result = null, $isView = true) { if ($var && (is_array($var) || is_object($var))) { if ($level > 0) { if (is_object($var)) $var = vvvv($var); foreach ($var as $key => $value) vv($value, $level-1, $result[$key], false); } else { $result = '...any array or object'; } } else $result = $var; if ($isView) vvv($result); } function vvv($v, $clearHtmlAndExit = false) { if ($clearHtmlAndExit) ob_end_clean(); if (is_object($v)) $v = vvvv($v); echo '<pre>' . print_r($v, true) . '</pre>'; if ($clearHtmlAndExit) exit; } function vvvv($obj) { $arr = array(); $refl = new ReflectionClass($obj); foreach ($refl->getProperties() as $k => $prop) { $prop->setAccessible(true); $arr[$prop->getName()] = $prop->getValue($obj); } return $arr; } function d($limit = 0) { ob_start(); debug_print_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, $limit); $debug = ob_get_contents(); ob_end_clean(); vvv($debug); exit; }

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylorotwell@gmail.com>
 */

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels nice to relax.
|
*/

require __DIR__.'/../bootstrap/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
