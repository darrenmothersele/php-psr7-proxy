<?php
/**
 * (c) Darren Mothersele <me@daz.is>
 * License WTFPL http://www.wtfpl.net/
 */


use function DI\get;
use function DI\object;

return [

    'target' => 'https://jsonplaceholder.typicode.com/',

    'middleware' => [
        \MyProxy\Middleware\ProxyMiddleware::class,
        \MyProxy\Middleware\FilterMiddleware::class
    ],

    \MyProxy\StackRunner::class => object()
        ->constructorParameter('stack', get('middleware')),

    \MyProxy\Middleware\ProxyMiddleware::class => object()
        ->constructorParameter('target', get('target')),

];
