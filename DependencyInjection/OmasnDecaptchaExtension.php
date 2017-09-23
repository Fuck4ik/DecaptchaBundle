<?php

namespace Omasn\DecaptchaBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class OmasnDecaptchaExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $processor = new Processor();
        $configuration = new Configuration();

        $aConfig = $processor->processConfiguration($configuration, $configs);

        foreach ($aConfig as $sService => $aFields) {
            foreach ($aFields as $sField => $value) {
                $container->setParameter($this->getAlias().'.'.$sService.'.'.$sField.'', $value);
            }
        }
    }

    public function getAlias()
    {
        return 'omasn_decaptcha';
    }
}
