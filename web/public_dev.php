<?php

require_once __DIR__.'/../app_public/bootstrap.php';
require_once __DIR__.'/../app_public/AppKernel.php';

use Symfony\Component\HttpFoundation\Request;

$kernel = new AppKernel('dev', true);
$kernel->handle(Request::createFromGlobals())->send();
