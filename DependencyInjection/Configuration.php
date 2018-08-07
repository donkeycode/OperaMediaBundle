<?php

namespace Opera\MediaBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree builder.
     *
     * opera_media:
    sources:
        images:
            filesystem: gaufrette.images_filesystem
     * @return TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode    = $treeBuilder->root('opera_media');

        $rootNode
            ->children()
                ->arrayNode('sources')
                    ->isRequired()
                    ->requiresAtLeastOneElement()
                    ->useAttributeAsKey('name')
                    ->arrayPrototype()
                        ->children()
                            ->scalarNode('filesystem')->isRequired()->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;
        
        return $treeBuilder;
    }
    

}