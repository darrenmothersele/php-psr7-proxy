<?php
/**
 * (c) Darren Mothersele <me@daz.is>
 * License WTFPL http://www.wtfpl.net/
 */


namespace MyProxy;


use DI\Container;
use DI\ContainerBuilder;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class App
{
    /** @var Container */
    protected $container;

    public function __construct()
    {
        $builder = new ContainerBuilder;
        $builder->addDefinitions(__DIR__.'/di-config.php');
        $this->container = $builder->build();
    }

    public function run(ServerRequestInterface $request, ResponseInterface $response)
    {
        $runner = $this->container->get(StackRunner::class);
        return $runner($request, $response);
    }

}
