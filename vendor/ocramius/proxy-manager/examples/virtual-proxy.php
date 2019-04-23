<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use ProxyManager\Factory\LazyLoadingValueHolderFactory;

class Foo
{
    public function __construct()
    {
        sleep(1);
    }

    public function doFoo()
    {
        echo "Foo!";
    }
}

$startTime = microtime(true);
$factory   = new LazyLoadingValueHolderFactory();

for ($i = 0; $i < 1000; $i += 1) {
    $proxy = $factory->createProxy(
        Foo::class,
        function (& $wrappedObject, $proxy, $method, $parameters, & $initializer) {
            $initializer   = null;
            $wrappedObject = new Foo();

            return true;
        }
    );
}

var_dump('time after 1000 instantiations: ' . (microtime(true) - $startTime));

$proxy->doFoo();

var_dump('time after single call to doFoo: ' . (microtime(true) - $startTime));
