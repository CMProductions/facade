<?php
namespace Mrubiosan\Facade\Bootstrap\Symfony;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Mrubiosan\Facade\ServiceLocatorAdapter\SymfonyAdapter;
use Mrubiosan\Facade\FacadeLoader;

class FacadeBundle extends Bundle
{
    public function boot()
    {
        if ($this->container->hasParameter('facade.aliases')) {
            $aliases = $this->container->getParameter('facade.aliases');
        }
        
        if (empty($aliases) || !is_array($aliases)) {
            $aliases = null;
        }

        $facadeServiceLocator = new SymfonyAdapter($this->container);
        new FacadeLoader($facadeServiceLocator, $aliases);
    }
}