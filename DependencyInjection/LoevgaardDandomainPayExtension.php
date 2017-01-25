<?php
namespace Loevgaard\DandomainPayBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class LoevgaardDandomainPayExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('loevgaard_dandomain_pay.wsdl',        $config['wsdl']);
        $container->setParameter('loevgaard_dandomain_pay.username',    $config['username']);
        $container->setParameter('loevgaard_dandomain_pay.password',    $config['password']);

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yml');
    }
}
