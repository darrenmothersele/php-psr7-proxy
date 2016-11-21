<?php
/**
 * (c) Darren Mothersele <me@daz.is>
 * License WTFPL http://www.wtfpl.net/
 */

namespace MyProxy\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;

class FilterMiddleware
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, $next)
    {
        $data = json_decode($response->getBody()->getContents(), true);

        // Do some manipulation of the data...
        $filter = function ($item) {
            if (isset($item['body'])) {
                $item['body'] = strtoupper($item['body']);
            }
            return $item;
        };
        $data = array_map($filter, $data);

        $response = new JsonResponse($data);

        return $next($request, $response);
    }
}
