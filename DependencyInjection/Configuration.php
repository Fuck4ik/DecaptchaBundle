<?php

namespace Omasn\DecaptchaBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This class contains the configuration information for the bundle.
 *
 * This information is solely responsible for how the different configuration
 * sections are normalized, and merged.
 *
 * @author Christophe Coevoet <stof@notk.org>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('omasn_decaptcha');

        $rootNode
            ->children()
                ->arrayNode('anticaptcha')
                ->addDefaultsIfNotSet()
                ->children()
                    ->scalarNode('api_key')->defaultNull()->end()
                ->end()
            ->end()
        ;
        $rootNode
            ->children()
                ->arrayNode('captcha_24')
                ->addDefaultsIfNotSet()
                ->children()
                    ->scalarNode('api_key')->defaultNull()->end()
                ->end()
            ->end()
        ;
        $rootNode
            ->children()
                ->arrayNode('pixodrom')
                ->addDefaultsIfNotSet()
                ->children()
                    ->scalarNode('api_key')->defaultNull()->end()
                ->end()
            ->end()
        ;
        $rootNode
            ->children()
                ->arrayNode('ripcaptcha')
                ->addDefaultsIfNotSet()
                ->children()
                    ->scalarNode('api_key')->defaultNull()->end()
                ->end()
            ->end()
        ;
        $rootNode
            ->children()
                ->arrayNode('ru_captcha')
                ->addDefaultsIfNotSet()
                ->children()
                    ->scalarNode('api_key')->defaultNull()->end()
                ->end()
            ->end()
        ;
        $rootNode
            ->children()
                ->arrayNode('socialink')
                ->addDefaultsIfNotSet()
                ->children()
                    ->scalarNode('api_key')->defaultNull()->end()
                ->end()
            ->end()
        ;
        $rootNode
            ->children()
                ->arrayNode('two_captcha')
                ->addDefaultsIfNotSet()
                ->children()
                    ->scalarNode('api_key')->defaultNull()->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
