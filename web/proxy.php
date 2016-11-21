<?php
/**
 * (c) Darren Mothersele <me@daz.is>
 * License WTFPL http://www.wtfpl.net/
 */

use MyProxy\App;
use Zend\Diactoros\Response;
use Zend\Diactoros\Response\SapiEmitter;
use Zend\Diactoros\ServerRequestFactory;

require_once __DIR__.'/../vendor/autoload.php';

$request = ServerRequestFactory::fromGlobals();
$response = (new App())->run($request, new Response);

(new SapiEmitter)->emit($response);
