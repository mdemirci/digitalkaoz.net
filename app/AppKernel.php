<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;
use rs\ProjectUtilitiesBundle\Project\BundleLoader;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
		$file = $this->getRootDir().'/config/bundles.yml';
        return BundleLoader::loadFromFile($file,$this->getEnvironment());	
	}

    public function registerRootDir()
    {
        return __DIR__;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        // use YAML for configuration
        // comment to use another configuration format
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');

        // uncomment to use XML for configuration
        //$loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.xml');

        // uncomment to use PHP for configuration
        //$loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.php');
    }
}
