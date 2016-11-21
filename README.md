# PHP PSR-7 Proxy

Some example code that demonstrates how to 
write a simple proxy using PSR-7 http
message objects.

See [this blog post](http://www.darrenmothersele.com/blog/2016/11/21/php-psr7-proxy/)
for more info.

## Usage

Run the example:

    php -S localhost:8080 web/proxy.php

Then use CURL, Postman, or your favourite API testing
tool to run some requests.
The example code proxies connections to the
`JSONPlaceholder` fake API.

So instead of [/posts](https://jsonplaceholder.typicode.com/posts)
you can try [/posts](http://localhost:8080/posts).
Or, instead of [/posts?userId=1](https://jsonplaceholder.typicode.com/posts?userId=1)
you can use [/posts?userId=1](http://localhost:8080/posts?userId=1).

## License 

[WTFPL](http://www.wtfpl.net/)
"The WTFPL is a very permissive license for software and other 
scientific or artistic works that offers a great degree of freedom. 
In fact, it is probably the best license out there."
