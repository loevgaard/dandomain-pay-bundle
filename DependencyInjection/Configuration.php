<?php
namespace Loevgaard\DandomainPayBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('loevgaard_dandomain_pay');

        $rootNode
            ->children()
                ->scalarNode('wsdl')->defaultValue('https://pay.dandomain.dk/service/payservice.asmx?WSDL')->end()
                ->scalarNode('username')->end()
                ->scalarNode('password')->end()
            ->end()
        ;

        return $treeBuilder;
    }
}