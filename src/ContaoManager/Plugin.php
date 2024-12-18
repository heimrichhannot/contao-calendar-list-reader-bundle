<?php

namespace HeimrichHannot\CalendarListReaderBundle\ContaoManager;

use Contao\CalendarBundle\ContaoCalendarBundle;
use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Contao\ManagerPlugin\Config\ConfigPluginInterface;
use HeimrichHannot\CalendarListReaderBundle\HeimrichHannotCalendarListReaderBundle;
use HeimrichHannot\FilterBundle\HeimrichHannotContaoFilterBundle;
use HeimrichHannot\ListBundle\HeimrichHannotContaoListBundle;
use HeimrichHannot\ReaderBundle\HeimrichHannotContaoReaderBundle;
use Symfony\Component\Config\Loader\LoaderInterface;

class Plugin implements BundlePluginInterface, ConfigPluginInterface
{
    public function getBundles(ParserInterface $parser): array
    {
        return [
            BundleConfig::create(HeimrichHannotCalendarListReaderBundle::class)
            ->setLoadAfter([
                ContaoCoreBundle::class,
                ContaoCalendarBundle::class,
                HeimrichHannotContaoListBundle::class,
                HeimrichHannotContaoReaderBundle::class,
                HeimrichHannotContaoFilterBundle::class
            ])
        ];
    }

    /**
     * @phpstan-ignore missingType.iterableValue
     */
    public function registerContainerConfiguration(LoaderInterface $loader, array $managerConfig): mixed
    {
        return $loader->load(__DIR__ . '/../../config/services.yaml');
    }
}