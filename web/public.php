<?php

require_once __DIR__.'/../app/bootstrap.php';
require_once __DIR__.'/../app/AppCache.php';

use Symfony\Component\HttpFoundation\Request;

// wrap the default AppKernel with the AppCache one
$kernel = new AppCache(new AppKernel('prod'));
$kernel->handle(Request::createFromGlobals())->send();
