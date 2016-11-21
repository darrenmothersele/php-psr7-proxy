<?php
/**
 * (c) Darren Mothersele <me@daz.is>
 * License WTFPL http://www.wtfpl.net/
 */


namespace MyProxy\Middleware;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Uri;

class ProxyMiddleware
{
    /** @var Client */
    protected $client;

    protected $target;

    public function __construct(Client $client, $target)
    {
        $this->client = $client;
        $this->target = $target;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next)
    {
        $target = new Uri($this->target);

        /** @var Uri $uri */
        $uri = $request->getUri()
            ->withScheme($target->getScheme())
            ->withHost($target->getHost())
            ->withPort($target->getPort());

        $request = $request->withUri($uri);

        $response = $this->client->send($request);

        return $next($request, $response);
    }
}
