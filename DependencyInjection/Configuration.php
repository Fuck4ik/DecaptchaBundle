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
                ->children()
                    ->scalarNode('action_field_key')->isRequired()->cannotBeEmpty()->end()
                ->end()
            ->end()
        ;
        $rootNode
            ->children()
                ->arrayNode('captcha_24')
                ->children()
                    ->scalarNode('action_field_key')->isRequired()->cannotBeEmpty()->end()
                ->end()
            ->end()
        ;
        $rootNode
            ->children()
                ->arrayNode('pixodrom')
                ->children()
                    ->scalarNode('action_field_key')->isRequired()->cannotBeEmpty()->end()
                ->end()
            ->end()
        ;
        $rootNode
            ->children()
                ->arrayNode('ripcaptcha')
                ->children()
                    ->scalarNode('action_field_key')->isRequired()->cannotBeEmpty()->end()
                ->end()
            ->end()
        ;
        $rootNode
            ->children()
                ->arrayNode('ru_captcha')
                ->children()
                    ->scalarNode('action_field_key')->isRequired()->cannotBeEmpty()->end()
                ->end()
            ->end()
        ;
        $rootNode
            ->children()
                ->arrayNode('socialink')
                ->children()
                    ->scalarNode('action_field_key')->isRequired()->cannotBeEmpty()->end()
                ->end()
            ->end()
        ;
        $rootNode
            ->children()
                ->arrayNode('two_captcha')
                ->children()
                    ->scalarNode('action_field_key')->isRequired()->cannotBeEmpty()->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
