<?php

require_once __DIR__.'/../app/bootstrap.php';
require_once __DIR__.'/../app/AppKernel.php';
require_once __DIR__.'/../app/AppCache.php';

use Symfony\Component\HttpFoundation\Request;

$kernel = new AppKernel('dev', true);
//$kernel = new AppCache(new AppKernel('dev', true));

$kernel->handle(Request::createFromGlobals())->send();
