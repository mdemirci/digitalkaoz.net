<?php

use Symfony\Component\ClassLoader\UniversalClassLoader;

$loader = new UniversalClassLoader();
$loader->registerNamespaces(array(
    'Symfony'                        => __DIR__.'/../vendor/symfony/src',
    'Doctrine\\Common\\DataFixtures' => __DIR__.'/../vendor/doctrine-data-fixtures/lib',
    'Doctrine\\Common'               => __DIR__.'/../vendor/doctrine-common/lib',
    'Doctrine\\DBAL\\Migrations'     => __DIR__.'/../vendor/doctrine-migrations/lib',
    'Doctrine\\MongoDB'              => __DIR__.'/../vendor/doctrine-mongodb/lib',
    'Doctrine\\ODM\\MongoDB'         => __DIR__.'/../vendor/doctrine-mongodb-odm/lib',
    'Doctrine\\DBAL'                 => __DIR__.'/../vendor/doctrine-dbal/lib',
    'Doctrine'                       => __DIR__.'/../vendor/doctrine/lib',
    'Zend'                           => __DIR__.'/../vendor/zend/library',    
    
    'Knplabs'                        => __DIR__.'/../src',
    'Sonata'                        => __DIR__.'/../src',
    'Bundle'                        => __DIR__.'/../src',
#    'Symfony\\Bundle'                         => __DIR__.'/../src',
    'Sensio'                        => __DIR__.'/../src',
    'rs'                             => __DIR__.'/../src'
));
$loader->registerPrefixes(array(
    'Twig_Extensions_' => __DIR__.'/../vendor/twig-extensions/lib',
    'Twig_'            => __DIR__.'/../vendor/twig/lib',
    'Swift_'           => __DIR__.'/../vendor/swiftmailer/lib/classes',
));
$loader->register();
